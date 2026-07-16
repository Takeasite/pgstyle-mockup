<?php $base = base_path(); ?>
<aside class="aside">
    <div class="aside__top">
        <img class="emblem" src="<?= $base ?>assets/img/emblem-pgstyle.svg" alt="">
        <h3>Interesse par cette prestation&nbsp;?</h3>
        <p>Contactez-moi pour un devis adapte a votre projet.</p>
    </div>
    <div class="aside__body">
        <a class="btn btn--primary" href="<?= $base ?>contact.php">Demander un devis</a>
        <div class="aside__row">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57a1 1 0 0 0-1.02.24l-2.2 2.2a15.05 15.05 0 0 1-6.59-6.59l2.2-2.21a.96.96 0 0 0 .25-1A11.36 11.36 0 0 1 8.5 4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1 17 17 0 0 0 17 17 1 1 0 0 0 1-1v-3.5a1 1 0 0 0-1-1z"/></svg>
            <span><?= setting_e('phone') ?></span>
        </div>
        <div class="aside__row">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
            <span><?= setting_e('email') ?></span>
        </div>
        <div class="aside__row">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            <span><?= setting_e('zone') ?></span>
        </div>
    </div>
</aside>
