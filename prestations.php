<?php
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/security.php';

$page_title = 'Prestations peinture et enduisage mecanises, PG Style Doubs';
$page_description = 'Quatre prestations mecanisees : peinture Airless, enduisage (ratissage), jointoiement de plaques de platre, enduit projete granite. Doubs et environs.';
$active_page = 'prestations';

include __DIR__ . '/partials/header.php';
?>

<section class="dhero">
    <div class="container">
        <div class="dhero__tag">Prestations</div>
        <h1>Les prestations</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cards">
            <a class="pcard" href="prestations/peinture-airless.php">
                <span class="pcard__ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M12 3l-8 5v13h6v-7h4v7h6V8z"/></svg></span>
                <span class="pcard__tag">Finition haute qualite</span>
                <h3>Peinture Airless</h3>
                <p>Mise en peinture par pulverisation haute pression, pour plafonds et murs.</p>
                <span class="pcard__link">Decouvrir &rarr;</span>
            </a>
            <a class="pcard" href="prestations/enduisage-airless.php">
                <span class="pcard__ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M3 3h18v4H3zm0 6h18v4H3zm0 6h18v4H3z"/></svg></span>
                <span class="pcard__tag">Finition premium</span>
                <h3>Enduisage Airless (ratissage)</h3>
                <p>Enduit de finition pelliculaire projete a l'Airless (ratissage).</p>
                <span class="pcard__link">Decouvrir &rarr;</span>
            </a>
            <a class="pcard" href="prestations/jointoiement-mecanise.php">
                <span class="pcard__ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M4 6h4v2H4zm6 0h10v2H10zM4 11h4v2H4zm6 0h10v2H10zM4 16h4v2H4zm6 0h10v2H10z"/></svg></span>
                <span class="pcard__tag">Preparation</span>
                <h3>Jointoiement mecanise</h3>
                <p>Pose des bandes a joints a la machine sur plaques de platre.</p>
                <span class="pcard__link">Decouvrir &rarr;</span>
            </a>
            <a class="pcard" href="prestations/enduit-projete.php">
                <span class="pcard__ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M12 3c-4.97 0-9 4.03-9 9 0 4.63 3.5 8.44 8 8.94V22h2v-1.06c4.5-.5 8-4.31 8-8.94 0-4.97-4.03-9-9-9z"/></svg></span>
                <span class="pcard__tag">Budget maitrise</span>
                <h3>Enduit projete granite</h3>
                <p>Enduit granite applique a la machine a projeter.</p>
                <span class="pcard__link">Decouvrir &rarr;</span>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/cta.php'; ?>
<?php include __DIR__ . '/partials/footer.php'; ?>
