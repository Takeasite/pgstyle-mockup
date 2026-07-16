<?php $base = base_path(); ?>
<section class="ctaband">
    <div class="container">
        <h2><?= content_e('home_cta_title', 'Demander un devis') ?></h2>
        <?php content_html('home_cta_body'); ?>
        <div class="ctaband__btns">
            <a class="btn btn--white btn--lg" href="<?= $base ?>contact.php">Demander mon devis</a>
            <a class="btn btn--primary btn--lg" href="tel:<?= e(str_replace(' ', '', setting('phone'))) ?>">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57a1 1 0 0 0-1.02.24l-2.2 2.2a15.05 15.05 0 0 1-6.59-6.59l2.2-2.21a.96.96 0 0 0 .25-1A11.36 11.36 0 0 1 8.5 4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1 17 17 0 0 0 17 17 1 1 0 0 0 1-1v-3.5a1 1 0 0 0-1-1z"/></svg>
                <?= setting_e('phone') ?>
            </a>
        </div>
    </div>
</section>
