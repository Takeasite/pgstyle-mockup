<?php
/**
 * Helpers publics pour l'affichage des pages.
 * Chaque zone modifiable du site utilise ces fonctions pour lire dans la base.
 *
 * Convention : les fonctions "_e" affichent avec htmlspecialchars (protection XSS).
 */

declare(strict_types=1);

require_once __DIR__ . '/db.php';

/**
 * Recupere un contenu texte par sa cle. Fallback sur $default si non trouve.
 */
function content(string $key, string $default = ''): string
{
    static $cache = null;
    if ($cache === null) {
        $cache = [];
        $rows = db()->query('SELECT key, value FROM contents')->fetchAll();
        foreach ($rows as $row) {
            $cache[$row['key']] = $row['value'];
        }
    }
    return $cache[$key] ?? $default;
}

/**
 * Affiche un contenu texte echappe pour le HTML.
 */
function content_e(string $key, string $default = ''): void
{
    echo htmlspecialchars(content($key, $default), ENT_QUOTES, 'UTF-8');
}

/**
 * Affiche un contenu texte en preservant les sauts de ligne (paragraphes).
 * Ideal pour les textareas : chaque paragraphe devient un <p>.
 */
function content_html(string $key, string $default = ''): void
{
    $text = content($key, $default);
    if ($text === '') return;
    $paragraphs = preg_split('/\r?\n\r?\n/', trim($text)) ?: [];
    foreach ($paragraphs as $p) {
        $p = trim($p);
        if ($p === '') continue;
        echo '<p>' . nl2br(htmlspecialchars($p, ENT_QUOTES, 'UTF-8')) . '</p>';
    }
}

/**
 * Recupere un reglage (coordonnees, horaires, etc.).
 */
function setting(string $key, string $default = ''): string
{
    static $cache = null;
    if ($cache === null) {
        $cache = [];
        $rows = db()->query('SELECT key, value FROM settings')->fetchAll();
        foreach ($rows as $row) {
            $cache[$row['key']] = $row['value'];
        }
    }
    return $cache[$key] ?? $default;
}

function setting_e(string $key, string $default = ''): void
{
    echo htmlspecialchars(setting($key, $default), ENT_QUOTES, 'UTF-8');
}

/**
 * Recupere les photos d'un slot (ex: "machine_1", "airless_gallery_1").
 * Retourne un tableau de photos triees par sort_order.
 */
function photos_for_slot(string $slot, bool $exact = true): array
{
    $stmt = db()->prepare(
        $exact
            ? 'SELECT * FROM photos WHERE slot = ? ORDER BY sort_order, id'
            : 'SELECT * FROM photos WHERE slot LIKE ? ORDER BY sort_order, id'
    );
    $stmt->execute([$exact ? $slot : $slot . '%']);
    return $stmt->fetchAll();
}

/**
 * Retourne l'URL publique d'une photo (relative a la racine du site).
 */
function photo_url(string $filename): string
{
    // Prefixe relatif selon la profondeur de la page courante (ex: ../ dans /prestations/)
    $prefix = base_path();

    // Si le fichier est dans les assets (livres par defaut)
    if (file_exists(__DIR__ . '/../assets/img/' . $filename)) {
        return $prefix . 'assets/img/' . $filename;
    }
    // Sinon on cherche dans uploads/
    foreach (['machines', 'prestations', 'divers'] as $sub) {
        if (file_exists(__DIR__ . '/../uploads/' . $sub . '/' . $filename)) {
            return $prefix . 'uploads/' . $sub . '/' . $filename;
        }
    }
    return $prefix . 'uploads/' . $filename;
}

/**
 * Affiche une galerie de photos pour un slot donne.
 * Si aucune photo : affiche des placeholders "Photo a venir".
 */
function render_gallery(string $slotPrefix, int $placeholders = 3): void
{
    $photos = photos_for_slot($slotPrefix, false);
    if (empty($photos)) {
        for ($i = 0; $i < $placeholders; $i++) {
            echo '<div class="ph">Photo a venir</div>';
        }
        return;
    }
    foreach ($photos as $p) {
        $url = htmlspecialchars(photo_url($p['filename']), ENT_QUOTES);
        $alt = htmlspecialchars($p['alt'] ?? '', ENT_QUOTES);
        $caption = htmlspecialchars($p['caption'] ?? '', ENT_QUOTES);
        echo '<div class="ph ph--photo">'
            . '<img src="' . $url . '" alt="' . $alt . '" loading="lazy">'
            . ($caption !== '' ? '<span class="ph__cap">' . $caption . '</span>' : '')
            . '</div>';
    }
}

/**
 * Base URL pour les liens (permet de gerer sous-dossiers en dev).
 * Retourne un chemin relatif adapte au niveau de profondeur de la page courante.
 */
function base_path(): string
{
    // Detecte si on est dans /prestations/
    $script = $_SERVER['SCRIPT_NAME'] ?? '';
    if (strpos($script, '/prestations/') !== false) {
        return '../';
    }
    return '';
}

function page_url(string $page): string
{
    return base_path() . $page;
}
