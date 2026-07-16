<?php
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/security.php';

$page_title = 'PG Style, peintre interieur mecanise a Baume-les-Dames (25)';
$page_description = 'Peinture Airless, enduisage, jointoiement mecanise et enduit projete. PG Style intervient a Baume-les-Dames, Besancon, Montbeliard et environs.';
$active_page = 'accueil';

include __DIR__ . '/partials/header.php';
?>

<section class="hero">
    <div class="container">
        <div class="hero__grid">
            <div>
                <span class="eyebrow"><?= content_e('home_eyebrow') ?></span>
                <h1><?= content_e('home_title_1') ?><em><?= content_e('home_title_2') ?></em></h1>
                <p class="hero__sub"><?= content_e('home_subtitle') ?></p>
                <div class="hero__ctas">
                    <a class="btn btn--primary btn--lg" href="contact.php">Demander un devis</a>
                    <a class="btn btn--white btn--lg" href="prestations.php">Voir mes prestations</a>
                </div>
                <div class="hero__meta">
                    <div><b>Peintre</b><span>enduiseur, jointeur</span></div>
                    <div><b>4</b><span>prestations mecanisees</span></div>
                    <div><b>Besancon</b><span>et environs</span></div>
                </div>
            </div>
            <div class="hero__card">
                <img src="assets/img/logo-pgstyle.svg" alt="Logo PG Style, peintre en batiment">
                <span class="hero__badge">
                    <img class="emblem" src="assets/img/emblem-pgstyle.svg" alt="">
                    Peintre, enduiseur, jointeur
                </span>
            </div>
        </div>
    </div>
</section>

<section class="proofbar">
    <div class="container">
        <div class="proofbar__grid">
            <div class="proofbar__it">
                <span class="proofbar__ic">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 3.16 2.11 5.85 5 6.72V21h4v-5.28c2.89-.87 5-3.56 5-6.72 0-3.87-3.13-7-7-7z"/></svg>
                </span>
                <div><b>Mecanisation</b><span>Peinture, enduisage, jointoiement</span></div>
            </div>
            <div class="proofbar__it">
                <span class="proofbar__ic">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                </span>
                <div><b>Prestations</b><span>Quatre specialites</span></div>
            </div>
            <div class="proofbar__it">
                <span class="proofbar__ic">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
                </span>
                <div><b>Zone</b><span><?= setting_e('zone') ?></span></div>
            </div>
            <div class="proofbar__it">
                <span class="proofbar__ic">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57a1 1 0 0 0-1.02.24l-2.2 2.2a15.05 15.05 0 0 1-6.59-6.59l2.2-2.21a.96.96 0 0 0 .25-1A11.36 11.36 0 0 1 8.5 4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1 17 17 0 0 0 17 17 1 1 0 0 0 1-1v-3.5a1 1 0 0 0-1-1z"/></svg>
                </span>
                <div><b>Contact</b><span><?= setting_e('phone') ?></span></div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="sec-head">
            <span class="eyebrow" style="justify-content:center">Prestations</span>
            <h2>Quatre prestations mecanisees</h2>
            <?php content_html('home_prestations_subtitle', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>'); ?>
        </div>
        <div class="cards">
            <a class="pcard" href="prestations/peinture-airless.php">
                <span class="pcard__ic">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M12 3l-8 5v13h6v-7h4v7h6V8z"/></svg>
                </span>
                <span class="pcard__tag">Finition haute qualite</span>
                <h3>Peinture Airless</h3>
                <p>Mise en peinture par pulverisation haute pression, pour plafonds et murs.</p>
                <span class="pcard__link">Decouvrir &rarr;</span>
            </a>
            <a class="pcard" href="prestations/enduisage-airless.php">
                <span class="pcard__ic">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M3 3h18v4H3zm0 6h18v4H3zm0 6h18v4H3z"/></svg>
                </span>
                <span class="pcard__tag">Finition premium</span>
                <h3>Enduisage Airless (ratissage)</h3>
                <p>Enduit de finition pelliculaire projete a l'Airless (ratissage).</p>
                <span class="pcard__link">Decouvrir &rarr;</span>
            </a>
            <a class="pcard" href="prestations/jointoiement-mecanise.php">
                <span class="pcard__ic">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M4 6h4v2H4zm6 0h10v2H10zM4 11h4v2H4zm6 0h10v2H10zM4 16h4v2H4zm6 0h10v2H10z"/></svg>
                </span>
                <span class="pcard__tag">Preparation</span>
                <h3>Jointoiement mecanise</h3>
                <p>Pose des bandes a joints a la machine sur plaques de platre.</p>
                <span class="pcard__link">Decouvrir &rarr;</span>
            </a>
            <a class="pcard" href="prestations/enduit-projete.php">
                <span class="pcard__ic">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M12 3c-4.97 0-9 4.03-9 9 0 4.63 3.5 8.44 8 8.94V22h2v-1.06c4.5-.5 8-4.31 8-8.94 0-4.97-4.03-9-9-9z"/></svg>
                </span>
                <span class="pcard__tag">Budget maitrise</span>
                <h3>Enduit projete granite</h3>
                <p>Enduit granite applique a la machine a projeter.</p>
                <span class="pcard__link">Decouvrir &rarr;</span>
            </a>
        </div>
    </div>
</section>

<section class="section section--alt">
    <div class="container">
        <div class="about">
            <div>
                <span class="eyebrow">Presentation</span>
                <h2><?= content_e('home_presentation_title') ?></h2>
                <?php content_html('home_presentation_body', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'); ?>
                <ul class="feat">
                    <li><span class="feat__ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span>
                        <div><b>Baume-les-Dames</b><span>25110, Doubs</span></div></li>
                    <li><span class="feat__ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span>
                        <div><b><?= setting_e('zone') ?></b><span>Zone d'intervention</span></div></li>
                    <li><span class="feat__ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span>
                        <div><b>Peintre, enduiseur, jointeur</b><span>Les trois metiers</span></div></li>
                </ul>
                <a class="btn btn--ghost" href="savoir-faire.php">En savoir plus</a>
            </div>
            <div class="about__visual">
                <img class="emblem" src="assets/img/emblem-pgstyle.svg" alt="">
                <h3><?= content_e('home_meca_title') ?></h3>
                <?php content_html('home_meca_body'); ?>
                <div class="about__stats">
                    <div><b>4</b><span>prestations</span></div>
                    <div><b>3</b><span>metiers</span></div>
                    <div><b>Interieur</b><span>specialite</span></div>
                    <div><b>Besancon</b><span>et environs</span></div>
                </div>
            </div>
        </div>

        <div class="machines">
            <div class="machines__head">
                <span class="eyebrow">Le materiel</span>
                <h3>Les machines</h3>
            </div>
            <div class="machines__grid">
                <?php
                $machines = photos_for_slot('machine_', false);
                foreach ($machines as $m):
                    // Nom lisible : Graco Mark XV HD 3-in-1 Xtreme Torque -> on split par le premier espace
                    $alt = $m['alt'] ?? '';
                    $parts = explode(' ', $alt, 2);
                    $brand = $parts[0] ?? '';
                    $model = $parts[1] ?? $alt;
                ?>
                <button type="button" class="machine" data-machine
                        data-photo="<?= e(photo_url($m['filename'])) ?>"
                        data-brand="<?= e($brand) ?>"
                        data-name="<?= e($model) ?>"
                        data-desc="<?= e($m['caption'] ?? '') ?>">
                    <span class="machine__photo"><img src="<?= e(photo_url($m['filename'])) ?>" alt="<?= e($alt) ?>" loading="lazy"></span>
                    <span class="machine__body">
                        <span class="machine__brand"><?= e($brand) ?></span>
                        <span class="machine__name"><?= e($model) ?></span>
                        <span class="machine__desc"><?= e($m['caption'] ?? '') ?></span>
                    </span>
                </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Modale machine -->
        <div class="machine-modal" id="machineModal" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="mmName">
            <div class="machine-modal__backdrop" data-close></div>
            <div class="machine-modal__panel" role="document">
                <button type="button" class="machine-modal__close" data-close aria-label="Fermer">&times;</button>
                <div class="machine-modal__photo"><img id="mmPhoto" src="" alt=""></div>
                <div class="machine-modal__body">
                    <span class="machine-modal__brand" id="mmBrand"></span>
                    <h3 class="machine-modal__name" id="mmName"></h3>
                    <p class="machine-modal__desc" id="mmDesc"></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/cta.php'; ?>
<?php include __DIR__ . '/partials/footer.php'; ?>
