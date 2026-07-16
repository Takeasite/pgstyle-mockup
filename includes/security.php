<?php
/**
 * Fonctions de securite : sessions, CSRF, sanitize, logging.
 * A inclure sur toutes les pages admin.
 */

declare(strict_types=1);

require_once __DIR__ . '/db.php';

/**
 * Demarre la session avec des reglages securises.
 */
function secure_session_start(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || ($_SERVER['SERVER_PORT'] ?? '') === '443';

    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => '',
        'secure' => $isHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_name('PGSTYLE_ADMIN');
    session_start();

    // Regenere l'ID toutes les 30 minutes pour limiter le risque de session fixation
    if (!isset($_SESSION['last_regen'])) {
        $_SESSION['last_regen'] = time();
    } elseif (time() - $_SESSION['last_regen'] > 1800) {
        session_regenerate_id(true);
        $_SESSION['last_regen'] = time();
    }
}

/**
 * Verifie si l'utilisateur est connecte. Redirige vers login sinon.
 */
function require_login(): void
{
    secure_session_start();
    if (empty($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
}

/**
 * Genere un jeton CSRF pour un formulaire.
 */
function csrf_token(): string
{
    secure_session_start();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Affiche un champ hidden avec le jeton CSRF.
 */
function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="'
        . htmlspecialchars(csrf_token(), ENT_QUOTES) . '">';
}

/**
 * Verifie le jeton CSRF d'un formulaire.
 */
function csrf_verify(): void
{
    secure_session_start();
    $submitted = $_POST['csrf_token'] ?? '';
    if (empty($submitted) || !hash_equals($_SESSION['csrf_token'] ?? '', $submitted)) {
        http_response_code(403);
        die('<h1>Erreur 403</h1><p>Jeton CSRF invalide. Rechargez la page et reessayez.</p>');
    }
}

/**
 * Nettoie une entree utilisateur pour de l'affichage (contre XSS).
 */
function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

/**
 * Log une modification dans l'historique.
 */
function log_change(string $table, string $key, ?string $oldValue, ?string $newValue): void
{
    secure_session_start();
    $userId = $_SESSION['user_id'] ?? null;

    $stmt = db()->prepare("
        INSERT INTO history (table_name, record_key, old_value, new_value, user_id)
        VALUES (?, ?, ?, ?, ?)
    ");
    $stmt->execute([$table, $key, $oldValue, $newValue, $userId]);
}

/**
 * Message flash (une seule fois) pour retours utilisateur.
 */
function flash_set(string $type, string $message): void
{
    secure_session_start();
    $_SESSION['flash'][] = ['type' => $type, 'message' => $message];
}

function flash_get(): array
{
    secure_session_start();
    $flash = $_SESSION['flash'] ?? [];
    unset($_SESSION['flash']);
    return $flash;
}

/**
 * Recupere l'utilisateur courant (nom d'affichage, etc.).
 */
function current_user(): ?array
{
    secure_session_start();
    if (empty($_SESSION['user_id'])) return null;
    static $user = null;
    if ($user === null) {
        $stmt = db()->prepare('SELECT id, username, display_name, last_login FROM users WHERE id = ?');
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch() ?: null;
    }
    return $user;
}
