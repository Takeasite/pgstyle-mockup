<?php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/security.php';

$page_title = 'Peinture Airless plafonds et murs, Besancon et Doubs, PG Style';
$page_description = 'Mise en peinture par pulverisation Airless haute pression : finition tendue sans trace de rouleau, pour plafonds et murs. Devis dans le Doubs.';
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
    {"@type": "ListItem", "position": 3, "name": "Peinture Airless"}
  ]
}
</script>


<section class="dhero">
    <div class="container">
        <a class="back" href="../prestations.php">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
            Toutes les prestations
        </a>
        <div class="dhero__tag">Finition haute qualite</div>
        <h1>Peinture Airless pour plafonds et murs</h1>
        <p>Mise en peinture par pulverisation haute pression, pour plafonds et murs.</p>
    </div>
</section>

<section class="dbody">
    <div class="container">
        <div class="dbody__grid">
            <div class="prose">
                <p class="lede"><?= '&laquo;&nbsp;' . e(content('airless_lede')) . '&nbsp;&raquo;' ?></p>

                <h2>Pourquoi exiger l'Airless pour vos plafonds&nbsp;?</h2>
                <?php content_html('airless_intro'); ?>
                <p>Grace a la technologie Airless, la peinture est atomisee sous haute pression et projetee en un brouillard ultra-fin&nbsp;:</p>
                <ul class="checklist">
                    <li><span class="ck"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span>
                        <div><b>Une finition parfaitement tendue&nbsp;:</b> sans aucun contact mecanique (pas de rouleau, pas de pinceau), la peinture se depose de maniere rigoureusement uniforme. Le grain est d'une finesse incomparable, offrant un aspect mat ou satine totalement lisse.</div></li>
                    <li><span class="ck"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span>
                        <div><b>Zero trace de reprise&nbsp;:</b> la rapidite de projection permet de peindre de grandes surfaces &laquo;&nbsp;mouille sur mouille&nbsp;&raquo;, d'un seul tenant. C'est la seule methode qui garantit l'absence totale de demarcations ou d'ombres, meme sur un tres grand plafond de piece de vie.</div></li>
                    <li><span class="ck"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span>
                        <div><b>Opacite et tenue maximales&nbsp;:</b> l'Airless permet de deposer l'epaisseur de peinture ideale des la premiere passe. Les pigments sont repartis de facon homogene, assurant un pouvoir couvrant exceptionnel et une couleur profonde.</div></li>
                </ul>

                <h2>Ma methodologie&nbsp;: la cle d'un chantier Airless reussi</h2>
                <?php content_html('airless_methode_intro'); ?>
                <div class="steps">
                    <div class="step">
                        <div class="step__n"></div>
                        <div><b>Un masquage chirurgical</b><span>Avant d'allumer la machine, l'integralite du chantier est protegee. Sols, fenetres, menuiseries et prises sont hermetiquement baches et scotches pour ne laisser place qu'aux surfaces a peindre.</span></div>
                    </div>
                    <div class="step">
                        <div class="step__n"></div>
                        <div><b>Filtration et gestion du produit</b><span>Utilisation exclusive de peintures professionnelles haut de gamme adaptees a la projection, filtrees en continu pour eviter tout grain ou impurete sur le support.</span></div>
                    </div>
                    <div class="step">
                        <div class="step__n"></div>
                        <div><b>Application croisee</b><span>Gestion precise du geste technique (distance, angle a 90&deg; et vitesse constante) pour croiser les passes et obtenir une epaisseur de film constante au micron pres.</span></div>
                    </div>
                </div>

                <h2>Vos avantages en tant que proprietaire</h2>
                <ul class="checklist">
                    <li><span class="ck"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span>
                        <div><b>Un rendu &laquo;&nbsp;Prestige&nbsp;&raquo;&nbsp;:</b> un aspect final haut de gamme avec un tendu impeccable, impossible a obtenir avec des outils manuels classiques.</div></li>
                    <li><span class="ck"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span>
                        <div><b>Une rapidite d'execution imbattable&nbsp;:</b> vos plafonds et murs sont peints en un temps record, reduisant d'autant l'immobilisation de vos pieces de vie et la duree de votre chantier.</div></li>
                </ul>

                <h2>Quelques realisations</h2>
                <div class="ph-strip">
                    <?php render_gallery('airless_gallery_', 3); ?>
                </div>
            </div>

            <?php include __DIR__ . '/../partials/aside-devis.php'; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../partials/cta.php'; ?>
<?php include __DIR__ . '/../partials/footer.php'; ?>
