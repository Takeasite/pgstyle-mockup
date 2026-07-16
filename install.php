<?php
/**
 * Installation initiale de PG Style.
 * A executer UNE FOIS a l'installation, depuis le navigateur :
 *   http://localhost/pgstyle.fr/install.php
 *
 * Cree la base SQLite, les tables, et un premier compte administrateur.
 * A supprimer ou renommer une fois l'installation terminee.
 */

declare(strict_types=1);

// Empeche l'execution une fois installe
if (file_exists(__DIR__ . '/data/pgstyle.db') && !isset($_GET['force'])) {
    echo '<pre>La base existe deja. Ajoutez ?force=1 pour la recreer (attention, ecrase tout).</pre>';
    exit;
}

// Cree le dossier data si besoin
$dataDir = __DIR__ . '/data';
if (!is_dir($dataDir)) {
    mkdir($dataDir, 0755, true);
}

$dbPath = $dataDir . '/pgstyle.db';

try {
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('PRAGMA foreign_keys = ON');
    $pdo->exec('PRAGMA journal_mode = WAL');

    // On repart d'une base propre : suppression des tables existantes
    // (evite les doublons si install.php est relance plusieurs fois)
    $pdo->exec('DROP TABLE IF EXISTS contents');
    $pdo->exec('DROP TABLE IF EXISTS settings');
    $pdo->exec('DROP TABLE IF EXISTS photos');
    $pdo->exec('DROP TABLE IF EXISTS users');
    $pdo->exec('DROP TABLE IF EXISTS history');

    // Table des contenus (zones texte modifiables)
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS contents (
            key TEXT PRIMARY KEY,
            value TEXT NOT NULL DEFAULT '',
            label TEXT NOT NULL,
            section TEXT NOT NULL,
            format TEXT NOT NULL DEFAULT 'text',
            updated_at TEXT DEFAULT (datetime('now'))
        )
    ");

    // Table des reglages (coordonnees, horaires, etc.)
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS settings (
            key TEXT PRIMARY KEY,
            value TEXT NOT NULL DEFAULT '',
            label TEXT NOT NULL,
            updated_at TEXT DEFAULT (datetime('now'))
        )
    ");

    // Table des photos
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS photos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            filename TEXT NOT NULL,
            slot TEXT NOT NULL,
            alt TEXT DEFAULT '',
            caption TEXT DEFAULT '',
            sort_order INTEGER DEFAULT 0,
            uploaded_at TEXT DEFAULT (datetime('now'))
        )
    ");
    $pdo->exec("CREATE INDEX IF NOT EXISTS idx_photos_slot ON photos(slot, sort_order)");

    // Table des utilisateurs
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL UNIQUE,
            password_hash TEXT NOT NULL,
            display_name TEXT DEFAULT '',
            last_login TEXT,
            failed_attempts INTEGER DEFAULT 0,
            locked_until TEXT
        )
    ");

    // Table de l'historique des modifications
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS history (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            table_name TEXT NOT NULL,
            record_key TEXT NOT NULL,
            old_value TEXT,
            new_value TEXT,
            user_id INTEGER,
            changed_at TEXT DEFAULT (datetime('now'))
        )
    ");
    $pdo->exec("CREATE INDEX IF NOT EXISTS idx_history_date ON history(changed_at DESC)");

    // -------- SEED DES CONTENUS PAR DEFAUT --------
    $contents = [
        // Accueil
        ['home_eyebrow', 'Peintre interieur mecanise', 'Petit texte au-dessus du titre', 'accueil', 'text'],
        ['home_title_1', 'Peinture, enduisage', 'Titre principal (1re ligne)', 'accueil', 'text'],
        ['home_title_2', 'et jointoiement mecanises', 'Titre principal (2e ligne, en italique)', 'accueil', 'text'],
        ['home_subtitle', 'Peinture Airless, enduisage et jointoiement mecanises. Baume-les-Dames, Besancon, Montbeliard, Valdahon, Lure et environs.', 'Sous-titre du hero', 'accueil', 'textarea'],
        ['home_prestations_subtitle', 'De la preparation des supports a la finition decorative, quatre prestations mecanisees pour des surfaces impeccables.', 'Sous-titre au-dessus des 4 prestations', 'accueil', 'textarea'],
        ['home_presentation_title', 'Peintre interieur mecanise', 'Titre du bloc presentation', 'accueil', 'text'],
        ['home_presentation_body', 'Creee en 2011 par Pierrick Grosjean, l\'entreprise PG Style met son savoir-faire et ses 30 ans d\'experience au service de vos murs et plafonds. Platrier-plaquiste et peintre de formation, installe depuis 2011 en tant que peintre en batiment.

De la preparation minutieuse a la finition decorative, je maitrise l\'ensemble des techniques pour donner vie a vos envies.', 'Texte de presentation sur l\'accueil (3-4 phrases)', 'accueil', 'textarea'],
        ['home_meca_title', 'La mecanisation', 'Titre de la carte bleue mecanisation', 'accueil', 'text'],
        ['home_meca_body', 'Enduiseuse, machine a projeter, applicateurs a bandes et boites de charge, ponceuse girafe a aspiration.', 'Texte de la carte mecanisation', 'accueil', 'textarea'],
        ['home_cta_title', 'Demander un devis', 'Titre du bandeau CTA', 'accueil', 'text'],
        ['home_cta_body', 'Parce que chaque projet est unique, je vous propose un devis adapte a votre niveau de finition et a votre budget.', 'Texte du bandeau CTA', 'accueil', 'textarea'],

        // Savoir-faire
        ['savoir_intro', 'Platrier-plaquiste et peintre de formation, Pierrick Grosjean a cree PG Style en 2011 et met 30 ans d\'experience au service de vos projets.', 'Introduction de la page Savoir-faire', 'savoir-faire', 'textarea'],
        ['savoir_body', 'Vous recherchez un professionnel d\'experience pour sublimer votre interieur ou concretiser vos projets de renovation ?

Creee en 2011 par Pierrick Grosjean, l\'entreprise PG Style met son savoir-faire et ses 30 ans d\'experience au service de vos murs et plafonds. Platrier-plaquiste et peintre de formation, installe depuis 2011 en tant que peintre en batiment.

Mes prestations et savoir-faire

De la preparation minutieuse a la finition decorative, je maitrise l\'ensemble des techniques pour donner vie a vos envies. Preparation et renovation : application d\'enduits, ratissage complet pour des surfaces lisses, pose de toile de renovation et de toile de verre. Decoration : application de peintures interieures, pose de papiers peints et produits decoratifs. Specialites et mecanisation : equipe de materiel moderne, je propose la mecanisation Airless pour la projection rapide et uniforme d\'enduits et de peintures, la mecanisation des joints de plaques de platre, ainsi que la projection d\'enduit granite.

Des solutions adaptees a votre budget

Parce que chaque projet est unique, j\'adapte mes produits et mes applications selon le niveau de finition que vous souhaitez. Gamme A : finition haut de gamme pour un resultat d\'exception. Gamme B : gamme standard, ideale pour un excellent rapport qualite/prix. Gamme C : gamme chantier, ideale pour le locatif ou pour rafraichir efficacement vos espaces.

Pourquoi choisir PG Style ?

Reactivite et flexibilite : pour les gros chantiers ou les demandes urgentes, je travaille en etroite collaboration avec un reseau d\'artisans partenaires de confiance afin de garantir une intervention rapide sans jamais transiger sur la qualite. L\'engagement qualite : une grande expertise technique, des conseils personnalises et des delais toujours respectes.', 'Corps de la page Savoir-faire (parcours, experience, approche)', 'savoir-faire', 'textarea'],

        // Avis
        ['avis_intro', '', 'Introduction de la page Avis', 'avis', 'textarea'],

        // Prestations (les 4 grands blocs)
        ['airless_lede', 'Plafonds et murs : la perfection d\'une mise en peinture par pulverisation Airless. Dites adieu aux traces de rouleau et de reprise. Offrez a vos pieces une finition tendue, lisse et parfaitement opaque.', 'Airless : accroche', 'prestations', 'textarea'],
        ['airless_intro', 'Le plafond est la zone la plus complexe a peindre : soumis a la lumiere directe des fenetres ou des eclairages integres, il ne pardonne aucune erreur. L\'application traditionnelle au rouleau cree souvent des surepaisseurs ou des manques visibles (les fameuses traces de cordage).', 'Airless : introduction', 'prestations', 'textarea'],
        ['airless_methode_intro', 'La peinture Airless ne tolere aucune approximation. Un resultat parfait repose a 80 % sur la rigueur de la preparation.', 'Airless : intro methodologie', 'prestations', 'textarea'],

        ['ratissage_lede', 'Le Ratissage Airless : l\'art d\'obtenir des surfaces au rendu "effet miroir". La pulverisation de haute technologie pour sublimer vos peintures et capter la lumiere sans aucune ombre.', 'Ratissage : accroche', 'prestations', 'textarea'],
        ['ratissage_intro', 'Si le jointoiement lisse les jonctions entre les plaques, le ratissage consiste a appliquer un enduit de finition pelliculaire sur la totalite de la surface de vos murs et plafonds.', 'Ratissage : introduction', 'prestations', 'textarea'],

        ['joint_lede', 'La haute precision du jointoiement mecanise pour vos interieurs. La garantie de surfaces parfaitement planes, sans aucun defaut visible a la lumiere rasante.', 'Jointoiement : accroche', 'prestations', 'textarea'],
        ['joint_intro', 'Le jointoiement n\'est pas qu\'une simple etape esthetique, c\'est la structure visuelle de vos futures pieces.', 'Jointoiement : introduction', 'prestations', 'textarea'],

        ['projete_lede', 'Le revetement "Projete" : la solution ideale pour les budgets maitrises et le locatif. Un aspect granite classique, une application ultra-rapide et un excellent rapport qualite/prix pour rafraichir vos murs et plafonds.', 'Projete : accroche', 'prestations', 'textarea'],
        ['projete_intro', 'Dans notre jargon de peintre, on l\'appelle simplement "le projete". C\'est un revetement de finition que j\'applique mecaniquement a l\'aide d\'une machine a projeter performante.', 'Projete : introduction', 'prestations', 'textarea'],
    ];

    $stmt = $pdo->prepare("
        INSERT OR REPLACE INTO contents (key, value, label, section, format)
        VALUES (?, ?, ?, ?, ?)
    ");
    foreach ($contents as $c) {
        $stmt->execute($c);
    }

    // -------- SEED DES REGLAGES --------
    $settings = [
        ['phone', '06 47 81 18 17', 'Telephone'],
        ['email', 'contact@pg-style.pro', 'Email'],
        ['address_street', '4 rue Marie Curie', 'Adresse : rue'],
        ['address_city', '25110 Baume-les-Dames', 'Adresse : ville et code postal'],
        ['hours', '', 'Horaires (une ligne par jour)'],
        ['zone', 'Baume-les-Dames, Besancon, Montbeliard, Valdahon, Lure et environs', 'Zone d\'intervention'],
        ['siret', '529 977 829 00025', 'SIRET'],
        ['footer_tagline', 'Peintre interieur artisan mecanise, base a Baume-les-Dames et intervenant autour de Besancon.', 'Texte du footer sous le logo'],
        ['footer_zone', '4 rue Marie Curie<br>25110 Baume-les-Dames', 'Adresse HTML du footer'],
        ['social_facebook', 'https://www.facebook.com/pierrick.grosjean.5', 'Lien Facebook'],
        ['social_instagram', 'https://www.instagram.com/pgstyle_peinture', 'Lien Instagram'],
        ['site_url', 'https://pg-style.pro', 'URL du site (pour le referencement)'],
        ['maintenance_mode', '0', 'Mode maintenance (0 = non, 1 = oui)'],
    ];

    $stmt = $pdo->prepare("
        INSERT OR REPLACE INTO settings (key, value, label) VALUES (?, ?, ?)
    ");
    foreach ($settings as $s) {
        $stmt->execute($s);
    }

    // -------- SEED DES PHOTOS EXISTANTES --------
    $photos = [
        // filename, slot, alt, caption, sort_order
        ['machine-mark-xv.jpg', 'machine_1', 'Graco Mark XV HD 3-in-1 Xtreme Torque',
         'Pulverisateur airless electrique sur chariot, pour l\'application des peintures et des enduits a haute pression.', 1],
        ['machine-gx-ff.jpg', 'machine_2', 'Graco GX FF Cordless',
         'Pulverisateur airless portatif sur batterie, pour les travaux de finition en toute mobilite.', 2],
        ['machine-europro-1180.jpg', 'machine_3', 'Storch Europro 1180',
         'Pulverisateur airless pour peintures fluides a semi-epaisses et enduits, en interieur comme en exterieur.', 3],
    ];
    $stmt = $pdo->prepare("
        INSERT INTO photos (filename, slot, alt, caption, sort_order) VALUES (?, ?, ?, ?, ?)
    ");
    foreach ($photos as $p) {
        $stmt->execute($p);
    }

    // -------- CREATION DU COMPTE ADMIN --------
    $defaultUser = 'pierrick';
    $defaultPass = 'pgstyle2026'; // A CHANGER APRES PREMIERE CONNEXION
    $hash = password_hash($defaultPass, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("
        INSERT OR REPLACE INTO users (username, password_hash, display_name)
        VALUES (?, ?, ?)
    ");
    $stmt->execute([$defaultUser, $hash, 'Pierrick Grosjean']);

    echo '<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Installation reussie</title>
<style>body{font-family:system-ui;max-width:640px;margin:40px auto;padding:0 20px;line-height:1.6}
h1{color:#14385C}code{background:#F4F6F7;padding:2px 8px;border-radius:4px;font-size:15px}
.ok{color:#0a7a2f}.warn{background:#FFF5E5;border-left:4px solid #FF9F1C;padding:14px 18px;border-radius:4px;margin:16px 0}
</style></head><body>
<h1 class="ok">Installation reussie</h1>
<p>La base de donnees a ete creee dans <code>data/pgstyle.db</code>.</p>
<div class="warn">
<b>Important pour la securite :</b>
<ol>
  <li>Supprimez ou renommez ce fichier <code>install.php</code> immediatement.</li>
  <li>Connectez-vous a l\'admin avec les identifiants par defaut, puis changez le mot de passe.</li>
</ol>
</div>
<p><b>Identifiants par defaut :</b><br>
Utilisateur : <code>' . $defaultUser . '</code><br>
Mot de passe : <code>' . $defaultPass . '</code></p>
<p><a href="admin/login.php">Aller a l\'admin</a> &nbsp;·&nbsp; <a href="index.php">Voir le site</a></p>
</body></html>';

} catch (PDOException $e) {
    http_response_code(500);
    echo '<pre>Erreur installation : ' . htmlspecialchars($e->getMessage()) . '</pre>';
    exit;
}
