<?php
/**
 * Connexion a la base de donnees SQLite.
 * A inclure au debut de chaque page qui a besoin de la base.
 */

declare(strict_types=1);

function db(): PDO
{
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }

    $dbPath = __DIR__ . '/../data/pgstyle.db';

    if (!file_exists($dbPath)) {
        http_response_code(500);
        die(
            '<h1>Base de donnees introuvable</h1>'
            . '<p>Le fichier <code>data/pgstyle.db</code> n\'existe pas. '
            . 'Executez d\'abord <a href="/install.php">install.php</a> pour l\'initialiser.</p>'
        );
    }

    try {
        $pdo = new PDO('sqlite:' . $dbPath);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->exec('PRAGMA foreign_keys = ON');
        $pdo->exec('PRAGMA journal_mode = WAL');
    } catch (PDOException $e) {
        http_response_code(500);
        die('<h1>Erreur de connexion</h1><pre>' . htmlspecialchars($e->getMessage()) . '</pre>');
    }

    return $pdo;
}
