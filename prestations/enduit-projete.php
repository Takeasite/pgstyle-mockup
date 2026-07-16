<?php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/security.php';

$page_title = 'Enduit projete granite, rapide et economique, PG Style Doubs';
$page_description = 'Enduit granite applique a la machine a projeter : solution rapide et economique pour rafraichir murs et plafonds, ideale en locatif.';
$active_page = 'prestations';

include __DIR__ . '/../partials/header.php';
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {"@type": "ListItem", "position": 1, "name": "Accueil", "item": "<?= e($siteUrl) ?>/"},
    {"@type": "ListItem", "position": 2, "name": "Prestations", "item": "<?= e($siteUrl) ?>/prestations.php"},
    {"@type": "ListItem", "position": 3, "name": "Enduit projete granite"}
  ]
}
</script>


<section class="dhero">
    <div class="container">
        <a class="back" href="../prestations.php">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
            Toutes les prestations
        </a>
        <div class="dhero__tag">Budget maitrise</div>
        <h1>Enduit projete granite</h1>
        <p>Enduit granite applique a la machine a projeter.</p>
    </div>
</section>

<section class="dbody">
    <div class="container">
        <div class="dbody__grid">
            <div class="prose">
                <p class="lede"><?= '&laquo;&nbsp;' . e(content('projete_lede')) . '&nbsp;&raquo;' ?></p>
                <h2>Qu'est-ce que l'enduit projeté et pourquoi le choisir&nbsp;?</h2><?php content_html('projete_intro'); ?>
                <p>Ce système consiste à pulvériser l'enduit pour créer un aspect granité composé de petits grains épars. C'est la solution technique parfaite dans plusieurs situations :</p>
                <ul class="checklist">
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Idéal pour l'investissement locatif :</b> vous cherchez à rendre un appartement propre, net et louable rapidement ? Le projeté offre un rendu propre et uniforme en un temps record.</span></li>
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Le choix des budgets malins :</b> contrairement à un ratissage lisse qui demande de nombreuses heures de main-d'œuvre (ponçage, passes successives), l'enduit granité s'applique directement après la préparation des bandes. C'est la solution la plus économique du marché pour habiller de grandes surfaces.</span></li>
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Masquage des imperfections :</b> grâce à sa texture en petits grains, le projeté masque naturellement les légers défauts visuels des plaques de plâtre. Il évite ainsi les phases de préparation lourdes, longues et coûteuses.</span></li>
                </ul>
                <h2>Ma méthode d'application à la machine</h2>
                <div class="steps">
                <div class="step">
                <div class="step__n"></div>
                <div><b>Un masquage complet</b><span>Comme pour toutes mes prestations mécanisées, les sols, fenêtres et ouvertures sont protégés de manière étanche avant l'allumage de la machine.</span></div>
                </div>
                <div class="step">
                <div class="step__n"></div>
                <div><b>Régularité du grain</b><span>La parfaite maîtrise de la pression de ma machine et du débit d'air me permet de garantir une projection homogène. Les petits grains sont répartis de manière régulière sur la totalité de vos murs et plafonds, sans effet de surcharge ni de manque.</span></div>
                </div>
                </div>
                <h2>Quelques realisations</h2>
                <div class="ph-strip">
                    <?php render_gallery('projete_gallery_', 3); ?>
                </div>
            </div>

            <?php include __DIR__ . '/../partials/aside-devis.php'; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../partials/cta.php'; ?>
<?php include __DIR__ . '/../partials/footer.php'; ?>
