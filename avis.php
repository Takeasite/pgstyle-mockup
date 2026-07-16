<?php
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/security.php';

$page_title = 'Avis clients PG Style, peintre interieur Baume-les-Dames';
$page_description = 'Les retours des clients de PG Style, peintre interieur mecanise intervenant a Baume-les-Dames, Besancon, Montbeliard et environs.';
$active_page = 'avis';

include __DIR__ . '/partials/header.php';

// Les 3 avis sont stockes dans contents avec les cles avis_1, avis_2, avis_3
// et un auteur associe avis_1_author, etc.
$avis = [];
for ($i = 1; $i <= 3; $i++) {
    $text = content("avis_{$i}");
    if ($text === '') $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $author = content("avis_{$i}_author", 'Exemple');
    $avis[] = ['text' => $text, 'author' => $author];
}
?>

<section class="dhero">
    <div class="container">
        <div class="dhero__tag">Avis</div>
        <h1>Les retours des clients</h1>
        <p><?= content_e('avis_intro', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.') ?></p>
    </div>
</section>

<section class="dbody">
    <div class="container">
        <div class="tgrid">
            <?php foreach ($avis as $a): ?>
            <article class="tcard">
                <span class="ph-pill">Exemple</span>
                <div class="tcard__stars">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <?php endfor; ?>
                </div>
                <p><?= e($a['text']) ?></p>
                <b><?= e($a['author']) ?></b><br><span>Ville a venir</span>
            </article>
            <?php endforeach; ?>
        </div>

        <div class="note" style="margin-top:32px">
            <b>Emplacement a remplir :</b> les vrais avis clients viendront ici. Ideal : recuperer des avis Google Business, ou demander a 3-4 clients recents un temoignage ecrit.
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/cta.php'; ?>
<?php include __DIR__ . '/partials/footer.php'; ?>
