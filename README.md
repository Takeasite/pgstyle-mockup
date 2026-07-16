# PG Style — Site + Back-office

Site vitrine pour PG Style (Pierrick Grosjean, peintre intérieur mécanisé, Baume-les-Dames).
Développé par TakeASite (Jérémy Leconte).

Stack : PHP 8+ / SQLite / GD (redimensionnement images), sans framework.

## Structure

```
pgstyle.fr/
├── install.php              # Script d'installation initial (à supprimer après)
├── index.php                # Accueil
├── prestations.php          # Hub prestations
├── prestations/             # 4 pages détail
├── savoir-faire.php
├── avis.php
├── contact.php
├── assets/                  # CSS, JS, images statiques
├── uploads/                 # Photos uploadées par Pierrick
├── data/                    # Base SQLite + backups
├── includes/                # db, helpers, security (côté public)
├── partials/                # header, footer, cta, aside
└── admin/                   # Back-office
    ├── login.php
    ├── index.php            # Dashboard
    ├── textes.php
    ├── prestations.php      # Édition des 4 pages prestations
    ├── photos.php
    ├── coordonnees.php
    ├── historique.php
    └── assets/              # CSS + JS admin
```

## Installation locale (WAMP)

1. Copier tout le contenu du dossier `pgstyle.fr` dans `C:\wamp64\www\pgstyle.fr`
   (ou `C:\wampnew2\www\pgstyle.fr` si c'est ton install).
2. Vérifier que les extensions PHP `pdo_sqlite`, `gd` et `mbstring` sont activées.
3. Ouvrir dans le navigateur : `http://localhost/pgstyle.fr/install.php`
4. **Supprimer `install.php`** une fois l'installation terminée.
5. Accéder à l'admin via l'icône engrenage discrète en bas du site,
   ou directement `http://localhost/pgstyle.fr/admin/login.php`.

**Identifiants par défaut** :
- Utilisateur : `pierrick`
- Mot de passe : `pgstyle2026` (à changer immédiatement en production)

## Déploiement OVH Starter Eco

1. Uploader tout le contenu de `pgstyle.fr/` à la racine web du serveur via FTP.
2. Vérifier que les dossiers `data/` et `uploads/` sont accessibles en écriture (chmod 755 ou 775).
3. Lancer `install.php` depuis le navigateur.
4. **Supprimer `install.php`** immédiatement après.
5. Se connecter à `/admin/`, changer le mot de passe.

**Config recommandée .htaccess** (à ajouter à la racine pour bloquer accès direct à data/) :
```apache
<Files "pgstyle.db">
    Order Allow,Deny
    Deny from all
</Files>
<FilesMatch "\.(md|log|txt)$">
    Order Allow,Deny
    Deny from all
</FilesMatch>
```

## Ce que Pierrick peut modifier

Depuis l'admin (`/admin/`) :

**Textes du site** : présentation d'accueil, page savoir-faire, page avis,
sous-titres, texte du bandeau devis, tous les textes de la maquette qui étaient
"Lorem ipsum".

**Prestations** : les 4 pages prestations sont organisées en onglets. Pour
chaque prestation, on peut modifier l'accroche, l'intro, et l'intro de la
méthodologie. Le reste (checklists, étapes) est structurel et écrit en HTML
dans les templates PHP — modifiable uniquement par le développeur.

**Photos** : 6 catégories organisées par onglets :
- Machines (3 emplacements fixes pour Mark XV, GX FF, Europro 1180)
- Galerie Peinture Airless (nombre libre)
- Galerie Ratissage (nombre libre)
- Galerie Jointoiement (nombre libre)
- Galerie Enduit projeté (nombre libre)
- Divers (portrait, véhicule)

Upload avec redimensionnement automatique (max 1600px de large, JPEG qualité 82).
Formats acceptés : JPG, PNG, WEBP. Taille max : 8 Mo.

**Coordonnées** : téléphone, email, adresse, horaires, zone d'intervention,
réseaux sociaux (Facebook, Instagram), SIRET, tagline du footer.

**Historique** : liste des 50 dernières modifications, avec possibilité de
restaurer une ancienne version pour les textes et coordonnées.

## Sécurité

- Sessions HTTP-only, SameSite=Lax, régénération d'ID toutes les 30 min
- CSRF sur tous les formulaires
- Mots de passe en `password_hash()` bcrypt
- Verrouillage compte 15 min après 5 tentatives échouées
- Upload : vérification MIME réelle (pas juste l'extension), taille limitée
- Toutes les requêtes SQL en `prepared statements` (PDO)
- Prévention XSS : `htmlspecialchars` sur toutes les sorties utilisateur

## Base de données

SQLite avec 5 tables :
- `contents` : zones texte modifiables (key/value + section + label)
- `settings` : coordonnées, horaires, réglages
- `photos` : photos avec slot, alt, caption, sort_order
- `users` : comptes admin
- `history` : historique des modifications

Le fichier `data/pgstyle.db` peut être sauvegardé simplement en le copiant.

## Ce qui reste à faire (post-livraison)

- [ ] Récupérer les vrais textes de Pierrick (présentation, savoir-faire, avis)
- [ ] Récupérer les vraies photos de chantiers (par prestation)
- [ ] Le cas échéant, ajouter les vrais avis clients
- [ ] Tester le formulaire de contact en production (envoi via `mail()`)
- [ ] Ajouter un `.htaccess` de sécurité (voir plus haut)
- [ ] Changer le mot de passe par défaut

## Contact technique

TakeASite / Jérémy Leconte
