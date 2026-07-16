<?php
/**
 * Sitemap XML dynamique.
 * Reference dans robots.txt. Les dates lastmod refletent la derniere
 * modification en base (table contents) ou la date du fichier.
 */

require_once __DIR__ . '/includes/helpers.php';

header('Content-Type: application/xml; charset=UTF-8');

$siteUrl = rtrim(setting('site_url', 'https://pg-style.pro'), '/');

// Derniere modif globale en base (pour les pages alimentees par la DB)
$lastDbChange = db()->query("SELECT MAX(updated_at) FROM contents")->fetchColumn();
$lastDb = $lastDbChange ? date('Y-m-d', strtotime($lastDbChange)) : date('Y-m-d');

$pages = [
    ['loc' => '/', 'priority' => '1.0', 'changefreq' => 'monthly'],
    ['loc' => '/prestations.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['loc' => '/prestations/peinture-airless.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['loc' => '/prestations/enduisage-airless.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['loc' => '/prestations/jointoiement-mecanise.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['loc' => '/prestations/enduit-projete.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['loc' => '/savoir-faire.php', 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['loc' => '/avis.php', 'priority' => '0.6', 'changefreq' => 'monthly'],
    ['loc' => '/contact.php', 'priority' => '0.8', 'changefreq' => 'yearly'],
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($pages as $p) {
    echo "  <url>\n";
    echo '    <loc>' . htmlspecialchars($siteUrl . $p['loc'], ENT_XML1) . "</loc>\n";
    echo '    <lastmod>' . $lastDb . "</lastmod>\n";
    echo '    <changefreq>' . $p['changefreq'] . "</changefreq>\n";
    echo '    <priority>' . $p['priority'] . "</priority>\n";
    echo "  </url>\n";
}
echo '</urlset>';
