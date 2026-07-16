<?php
$base = base_path();
?>
</main>

<footer class="footer">
    <div class="container">
        <div class="footer__grid">
            <div>
                <img src="<?= $base ?>assets/img/logo-pgstyle.svg" alt="PG Style" class="footer__logo">
                <p><?= setting('footer_tagline') ?></p>
                <?php if (setting('social_facebook') || setting('social_instagram')): ?>
                <div class="footer__social">
                    <?php if (setting('social_facebook')): ?>
                        <a href="<?= e(setting('social_facebook')) ?>" target="_blank" rel="noopener" aria-label="Facebook">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                        </a>
                    <?php endif; ?>
                    <?php if (setting('social_instagram')): ?>
                        <a href="<?= e(setting('social_instagram')) ?>" target="_blank" rel="noopener" aria-label="Instagram">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <div>
                <h4>Prestations</h4>
                <a href="<?= $base ?>prestations/peinture-airless.php">Peinture Airless</a>
                <a href="<?= $base ?>prestations/enduisage-airless.php">Enduisage Airless</a>
                <a href="<?= $base ?>prestations/jointoiement-mecanise.php">Jointoiement mecanise</a>
                <a href="<?= $base ?>prestations/enduit-projete.php">Enduit projete</a>
            </div>
            <div>
                <h4>Le site</h4>
                <a href="<?= $base ?>index.php">Accueil</a>
                <a href="<?= $base ?>savoir-faire.php">Savoir-faire</a>
                <a href="<?= $base ?>avis.php">Avis</a>
                <a href="<?= $base ?>contact.php">Contact</a>
            </div>
            <div>
                <h4>Coordonnees</h4>
                <a href="tel:<?= e(str_replace(' ', '', setting('phone'))) ?>"><?= setting_e('phone') ?></a>
                <a href="mailto:<?= e(setting('email')) ?>"><?= setting_e('email') ?></a>
                <p><?= setting('footer_zone') ?></p>
                <p class="footer__small">SIRET <?= setting_e('siret') ?><br>Assurance decennale</p>
            </div>
        </div>
        <div class="footer__bottom">
            <p>&copy; <?= date('Y') ?> PG Style. Site realise par <b>TakeASite</b>.
                <a href="<?= $base ?>admin/login.php" class="footer__admin" aria-label="Administration" title="Administration">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M19.14 12.94c.04-.3.06-.61.06-.94 0-.32-.02-.64-.07-.94l2.03-1.58c.18-.14.23-.41.12-.61l-1.92-3.32c-.12-.22-.37-.29-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54c-.04-.24-.24-.41-.48-.41h-3.84c-.24 0-.43.17-.47.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.08-.47 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.05.3-.09.63-.09.94s.02.64.07.94l-2.03 1.58c-.18.14-.23.41-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.01-1.58zM12 15.6c-1.98 0-3.6-1.62-3.6-3.6s1.62-3.6 3.6-3.6 3.6 1.62 3.6 3.6-1.62 3.6-3.6 3.6z"/></svg>
                </a>
            </p>
        </div>
    </div>
</footer>

<script src="<?= $base ?>assets/js/main.js"></script>
</body>
</html>
