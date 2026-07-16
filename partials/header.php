<?php
/**
 * En-tete commun a toutes les pages publiques.
 * Variables optionnelles a definir avant l'include :
 *   $page_title, $page_description, $active_page, $noindex (bool)
 */
if (!isset($page_title)) $page_title = 'PG Style, peintre interieur mecanise a Baume-les-Dames';
if (!isset($page_description)) $page_description = 'Peinture Airless, enduisage et jointoiement mecanises. Baume-les-Dames, Besancon et environs.';
if (!isset($active_page)) $active_page = '';
$base = base_path();

// URL canonique construite depuis le reglage site_url + chemin courant
$siteUrl = rtrim(setting('site_url', 'https://pg-style.pro'), '/');
$scriptPath = $_SERVER['SCRIPT_NAME'] ?? '/index.php';
// index.php racine = URL racine propre
$canonicalPath = ($scriptPath === '/index.php') ? '/' : $scriptPath;
$canonical = $siteUrl . $canonicalPath;
$ogImage = $siteUrl . '/assets/img/logo-pgstyle.svg';
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($page_title) ?></title>
    <meta name="description" content="<?= e($page_description) ?>">
    <?php if (!empty($noindex)): ?>
    <meta name="robots" content="noindex, nofollow">
    <?php else: ?>
    <link rel="canonical" href="<?= e($canonical) ?>">
    <?php endif; ?>
    <meta name="theme-color" content="#14385C">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="PG Style">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:title" content="<?= e($page_title) ?>">
    <meta property="og:description" content="<?= e($page_description) ?>">
    <meta property="og:url" content="<?= e($canonical) ?>">
    <meta property="og:image" content="<?= e($ogImage) ?>">

    <link rel="stylesheet" href="<?= $base ?>assets/css/style.css">
    <link rel="icon" type="image/svg+xml" href="<?= $base ?>assets/img/emblem-pgstyle.svg">

    <!-- Donnees structurees : entreprise locale -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "HousePainter",
      "name": "PG Style",
      "url": <?= json_encode($siteUrl) ?>,
      "telephone": <?= json_encode(setting('phone')) ?>,
      "email": <?= json_encode(setting('email')) ?>,
      "address": {
        "@type": "PostalAddress",
        "streetAddress": <?= json_encode(setting('address_street')) ?>,
        "addressLocality": "Baume-les-Dames",
        "postalCode": "25110",
        "addressCountry": "FR"
      },
      "areaServed": <?= json_encode(setting('zone')) ?>,
      "founder": {
        "@type": "Person",
        "name": "Pierrick Grosjean"
      },
      "knowsAbout": ["Peinture Airless", "Enduisage Airless", "Jointoiement mecanise", "Enduit projete"],
      "sameAs": [
        <?= json_encode(setting('social_facebook')) ?>,
        <?= json_encode(setting('social_instagram')) ?>
      ]
    }
    </script>
</head>
<body>

<div class="demobar">Site PG Style, peintre interieur mecanise</div>

<header class="header">
    <div class="container header__in">
        <a href="<?= $base ?>index.php" class="brand" aria-label="PG Style, accueil">
            <img src="<?= $base ?>assets/img/logo-pgstyle-nav.svg" alt="PG Style, peintre en batiment" width="150" height="44">
        </a>
        <div class="header__right">
            <nav class="nav" id="mainNav" aria-label="Navigation principale">
                <a href="<?= $base ?>index.php"<?= $active_page === 'accueil' ? ' class="is-active"' : '' ?>>Accueil</a>
                <a href="<?= $base ?>prestations.php"<?= $active_page === 'prestations' ? ' class="is-active"' : '' ?>>Prestations</a>
                <a href="<?= $base ?>savoir-faire.php"<?= $active_page === 'savoir-faire' ? ' class="is-active"' : '' ?>>Savoir-faire</a>
                <a href="<?= $base ?>avis.php"<?= $active_page === 'avis' ? ' class="is-active"' : '' ?>>Avis</a>
                <a href="<?= $base ?>contact.php" class="btn btn--primary">Demander un devis</a>
            </nav>
            <?php if (setting('social_facebook') || setting('social_instagram')): ?>
            <div class="header__social">
                <span class="header__social-label">Nos reseaux sociaux</span>
                <?php if (setting('social_facebook')): ?>
                <a class="header__social-link header__social-link--fb" href="<?= e(setting('social_facebook')) ?>" aria-label="Facebook" target="_blank" rel="noopener">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                    </svg>
                </a>
                <?php endif; ?>
                <?php if (setting('social_instagram')): ?>
                <a class="header__social-link header__social-link--ig" href="<?= e(setting('social_instagram')) ?>" aria-label="Instagram" target="_blank" rel="noopener">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                        <line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/>
                    </svg>
                </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <button class="nav__burger" aria-label="Menu" aria-expanded="false" aria-controls="mainNav" onclick="this.setAttribute('aria-expanded', document.getElementById('mainNav').classList.toggle('is-open') ? 'true' : 'false')">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M3 6h14M3 10h14M3 14h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </button>
        </div>
    </div>
</header>

<main>
