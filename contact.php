<?php
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/security.php';

$page_title = 'Contact et devis, PG Style peintre interieur, 06 47 81 18 17';
$page_description = 'Demandez un devis a PG Style : peinture Airless, enduisage, jointoiement. Intervention a Baume-les-Dames, Besancon, Montbeliard, Valdahon, Lure.';
$active_page = 'contact';

// Traitement du formulaire (envoi mail simple, sans stockage BD pour l'instant)
$formStatus = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify();

    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $tel = trim($_POST['tel'] ?? '');
    $message = trim($_POST['message'] ?? '');
    // Honeypot anti-bot
    $honeypot = $_POST['website'] ?? '';

    if ($honeypot !== '') {
        $formStatus = ['type' => 'error', 'msg' => 'Erreur.'];
    } elseif ($nom === '' || $email === '' || $message === '') {
        $formStatus = ['type' => 'error', 'msg' => 'Merci de remplir les champs obligatoires.'];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formStatus = ['type' => 'error', 'msg' => 'Adresse email invalide.'];
    } else {
        $to = setting('email', 'contact@pg-style.pro');
        $subject = 'Nouvelle demande de devis via le site';
        $body = "Nouvelle demande recue depuis pg-style.pro\n\n"
              . "Nom : $nom\n"
              . "Email : $email\n"
              . "Telephone : $tel\n\n"
              . "Message :\n$message\n";
        $headers = "From: no-reply@pg-style.pro\r\n"
                 . "Reply-To: $email\r\n"
                 . "Content-Type: text/plain; charset=UTF-8\r\n";

        // En production sur OVH, mail() marche. En dev local, on log au lieu d'envoyer.
        $sent = @mail($to, $subject, $body, $headers);
        if ($sent) {
            $formStatus = ['type' => 'success', 'msg' => 'Merci ! Votre demande a bien ete envoyee. Reponse rapide garantie.'];
        } else {
            // Fallback : ecrire dans un fichier log
            $logDir = __DIR__ . '/data';
            @file_put_contents($logDir . '/contact-log.txt',
                date('Y-m-d H:i:s') . " - $nom <$email> $tel\n$message\n\n---\n\n",
                FILE_APPEND);
            $formStatus = ['type' => 'success', 'msg' => 'Merci ! Votre demande a bien ete enregistree.'];
        }
    }
}

include __DIR__ . '/partials/header.php';
?>

<section class="dhero">
    <div class="container">
        <div class="dhero__tag">Contact</div>
        <h1>Contact</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
</section>

<section class="dbody">
    <div class="container">
        <div class="contact">
            <div class="contact__form">
                <?php if ($formStatus): ?>
                <div class="flash flash--<?= $formStatus['type'] ?>">
                    <?= e($formStatus['msg']) ?>
                </div>
                <?php endif; ?>

                <form method="post" action="contact.php" data-contact-form>
                    <?= csrf_field() ?>
                    <!-- Honeypot anti-bot -->
                    <input type="text" name="website" value="" style="position:absolute;left:-9999px" tabindex="-1" autocomplete="off">

                    <div class="field">
                        <label for="nom">Nom *</label>
                        <input type="text" id="nom" name="nom" required value="<?= isset($_POST['nom']) ? e($_POST['nom']) : '' ?>">
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required value="<?= isset($_POST['email']) ? e($_POST['email']) : '' ?>">
                        </div>
                        <div class="field">
                            <label for="tel">Telephone</label>
                            <input type="tel" id="tel" name="tel" value="<?= isset($_POST['tel']) ? e($_POST['tel']) : '' ?>">
                        </div>
                    </div>
                    <div class="field">
                        <label for="message">Votre projet *</label>
                        <textarea id="message" name="message" rows="6" required><?= isset($_POST['message']) ? e($_POST['message']) : '' ?></textarea>
                    </div>
                    <button type="submit" class="btn btn--primary btn--lg" data-submit>Envoyer ma demande</button>
                </form>
            </div>

            <div class="contact__info">
                <h3>Coordonnees</h3>
                <div class="cinfo">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57a1 1 0 0 0-1.02.24l-2.2 2.2a15.05 15.05 0 0 1-6.59-6.59l2.2-2.21a.96.96 0 0 0 .25-1A11.36 11.36 0 0 1 8.5 4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1 17 17 0 0 0 17 17 1 1 0 0 0 1-1v-3.5a1 1 0 0 0-1-1z"/></svg>
                    <div><b>Telephone</b><a href="tel:<?= e(str_replace(' ', '', setting('phone'))) ?>"><?= setting_e('phone') ?></a></div>
                </div>
                <div class="cinfo">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    <div><b>Email</b><a href="mailto:<?= e(setting('email')) ?>"><?= setting_e('email') ?></a></div>
                </div>
                <div class="cinfo">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
                    <div><b>Adresse</b><?= setting_e('address_street') ?><br><?= setting_e('address_city') ?></div>
                </div>
                <div class="cinfo">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 6v6l4 2"/><circle cx="12" cy="12" r="10"/></svg>
                    <div><b>Disponibilite</b><?php $h = setting('hours'); echo $h !== '' ? nl2br(e($h)) : 'Lorem ipsum dolor sit amet.'; ?></div>
                </div>
                <div class="cinfo">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
                    <div><b>Zone d'intervention</b><?= setting_e('zone') ?></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
