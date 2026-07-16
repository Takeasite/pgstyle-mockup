<?php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/security.php';

$page_title = 'Enduisage Airless, ratissage effet miroir, Doubs, PG Style';
$page_description = 'Ratissage a l\'enduit Airless pelliculaire : surfaces lisses au rendu tendu pour murs et plafonds. Baume-les-Dames, Besancon et environs.';
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
    {"@type": "ListItem", "position": 3, "name": "Enduisage Airless (ratissage)"}
  ]
}
</script>


<section class="dhero">
    <div class="container">
        <a class="back" href="../prestations.php">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
            Toutes les prestations
        </a>
        <div class="dhero__tag">Finition premium</div>
        <h1>Enduisage Airless (ratissage)</h1>
        <p>Enduit de finition pelliculaire projete a l'Airless (ratissage).</p>
    </div>
</section>

<section class="dbody">
    <div class="container">
        <div class="dbody__grid">
            <div class="prose">
                <p class="lede"><?= '&laquo;&nbsp;' . e(content('ratissage_lede')) . '&nbsp;&raquo;' ?></p>
                <h2>Qu'est-ce que le ratissage Airless et pourquoi est-ce indispensable&nbsp;?</h2><?php content_html('ratissage_intro'); ?>
                <ul class="checklist">
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Zéro trace de reprise :</b> contrairement à une application manuelle au rouleau ou à la taloche, la pompe Airless pulvérise un brouillard d'enduit parfaitement uniforme. Il n'y a aucune surépaisseur locale ni coup d'outil visible.</span></li>
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Uniformisation absolue de l'absorption :</b> le carton de la plaque de plâtre et l'enduit des joints boivent la peinture différemment. La fine pellicule d'enduit Airless isole le support de manière 100&nbsp;% homogène. Fini l'effet « spectre » (les bandes qui réapparaissent comme des ombres après l'application de la peinture).</span></li>
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Un lissage glacé :</b> après la projection, l'enduit est tendu à l'aide de lames professionnelles de grande largeur. Le support est littéralement « glacé », offrant un aspect soyeux au toucher, idéal pour les peintures mates, satinées ou les teintes sombres.</span></li>
                </ul>
                <h2>Pour quels projets recommander le ratissage Airless&nbsp;?</h2>
                <ul class="checklist">
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Pièces à forte luminosité :</b> idéal pour les salons avec baies vitrées ou les pièces équipées de spots LED rasants qui ne pardonnent aucun micro-relief.</span></li>
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Plafonds de grande superficie :</b> le plafond est la surface la plus difficile à rendre homogène. L'Airless permet de traiter de grands volumes d'un seul tenant, évitant les défauts de raccord.</span></li>
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Exigence de finition supérieure :</b> pour les propriétaires qui refusent le grain grossier du carton de plâtre et exigent un rendu tendu digne des plus hauts standards professionnels.</span></li>
                </ul>
                <h2>Vos avantages clients</h2>
                <ul class="checklist">
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Vitesse d'exécution :</b> la technologie Airless permet de couvrir de grandes surfaces très rapidement, réduisant la durée globale de votre chantier.</span></li>
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Économie de peinture :</b> un mur parfaitement ratissé n'absorbe pas excessivement la peinture, ce qui garantit un meilleur pouvoir couvrant et économise vos fournitures.</span></li>
                </ul>
                <h2>Quelques realisations</h2>
                <div class="ph-strip">
                    <?php render_gallery('ratissage_gallery_', 3); ?>
                </div>
            </div>

            <?php include __DIR__ . '/../partials/aside-devis.php'; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../partials/cta.php'; ?>
<?php include __DIR__ . '/../partials/footer.php'; ?>
