<?php
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/security.php';

$page_title = 'Savoir-faire, peintre enduiseur jointeur mecanise, PG Style';
$page_description = 'Le savoir-faire de Pierrick Grosjean, peintre interieur mecanise : peinture, enduisage et jointoiement a la machine. Baume-les-Dames, Doubs.';
$active_page = 'savoir-faire';

include __DIR__ . '/partials/header.php';
?>

<section class="dhero">
    <div class="container">
        <div class="dhero__tag">Savoir-faire</div>
        <h1>Peintre interieur mecanise</h1>
        <p><?= content_e('savoir_intro', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.') ?></p>
    </div>
</section>

<section class="dbody">
    <div class="container container--narrow">
        <div class="prose">
            <?php
            $body = content('savoir_body');
            if ($body === '') {
                echo '<p class="lede">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>';
                echo '<h2>Lorem ipsum</h2>';
                echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>';
                echo '<h2>Lorem ipsum dolor</h2>';
                echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>';
                echo '<div class="note"><b>A completer :</b> Pierrick, dictez-moi votre parcours, votre approche du metier, et pourquoi vous avez fait le choix de la mecanisation.</div>';
            } else {
                content_html('savoir_body');
            }
            ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/cta.php'; ?>
<?php include __DIR__ . '/partials/footer.php'; ?>
