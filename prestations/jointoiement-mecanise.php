<?php
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/security.php';

$page_title = 'Jointoiement mecanise placo, Baume-les-Dames, PG Style';
$page_description = 'Pose des bandes a joints a la machine sur plaques de platre : surfaces planes sans defaut a la lumiere rasante. Doubs et environs.';
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
    {"@type": "ListItem", "position": 3, "name": "Jointoiement mecanise"}
  ]
}
</script>


<section class="dhero">
    <div class="container">
        <a class="back" href="../prestations.php">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
            Toutes les prestations
        </a>
        <div class="dhero__tag">Preparation</div>
        <h1>Jointoiement mecanise</h1>
        <p>Pose des bandes a joints a la machine sur plaques de platre.</p>
    </div>
</section>

<section class="dbody">
    <div class="container">
        <div class="dbody__grid">
            <div class="prose">
                <p class="lede"><?= '&laquo;&nbsp;' . e(content('joint_lede')) . '&nbsp;&raquo;' ?></p>
                <h2>Pourquoi la mécanisation change tout pour votre maison</h2><?php content_html('joint_intro'); ?>
                <ul class="checklist">
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Un dosage d'enduit millimétré :</b> la machine dépose la quantité exacte de matière sous la bande de plâtre. Résultat : zéro bulle d'air, aucun risque de décollement futur ou de micro-fissures.</span></li>
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Une planéité parfaite :</b> les boîtes de finition mécanisées lissent l'enduit de manière totalement homogène. Les vagues et les surépaisseurs sont éliminées, ce qui réduit drastiquement le besoin de ponçage agressif.</span></li>
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span><b>Respect du support :</b> moins de ponçage signifie que le carton de vos plaques de plâtre (BA13) n'est pas agressé ni peluché. Votre support reste sain pour recevoir les couches de peinture.</span></li>
                </ul>
                <h2>Les étapes de mon intervention sur votre chantier</h2>
                <div class="steps">
                <div class="step">
                <div class="step__n"></div>
                <div><b>Diagnostic du support</b><span>Vérification de la conformité de la pose des plaques (vis bien enfoncées, alignement bout à bout).</span></div>
                </div>
                <div class="step">
                <div class="step__n"></div>
                <div><b>Collage et serrage mécanisés</b><span>Application simultanée et automatisée de l'enduit et de la bande pour une adhérence et une cohésion parfaites.</span></div>
                </div>
                <div class="step">
                <div class="step__n"></div>
                <div><b>Passes de charge et de finition</b><span>Utilisation de boîtes de lissage de différentes largeurs pour noyer la bande et rendre la transition invisible à l'œil comme au toucher.</span></div>
                </div>
                <div class="step">
                <div class="step__n"></div>
                <div><b>Ponçage technique</b><span>Réalisé à l'aide d'une ponceuse girafe dotée d'une aspiration centralisée haute performance, préservant votre intérieur de la poussière.</span></div>
                </div>
                </div>
                <h2>Mes prestations</h2>
                <ul class="checklist">
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span>Collage et serrage des bandes armées et bandes papier.</span></li>
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span>Enduisage et finition des joints (murs et plafonds).</span></li>
                <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
                </svg></span><span>Traitement des angles entrants et sortants.</span></li>
                </ul>
                <h2>Quelques realisations</h2>
                <div class="ph-strip">
                    <?php render_gallery('joint_gallery_', 3); ?>
                </div>
            </div>

            <?php include __DIR__ . '/../partials/aside-devis.php'; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../partials/cta.php'; ?>
<?php include __DIR__ . '/../partials/footer.php'; ?>
