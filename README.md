# PG Style, maquette du site

Maquette statique du site de **PG Style**, peintre intérieur mécanisé à Baume-les-Dames (Besançon et environs).

Réalisée par **TakeASite** (Jérémy Leconte).

> Cette maquette sert à valider le contenu, la structure et le design avant la construction du site final en PHP. Les textes et chiffres sont des propositions, à confirmer avec Pierrick.

## Comment l'ouvrir

Double-cliquez sur `index.html` pour l'ouvrir dans votre navigateur (Chrome, Firefox, Edge). Aucune installation n'est nécessaire. Toute la navigation fonctionne : menu, cartes de prestations, boutons.

## Structure du projet

```
pgstyle-maquette/
├── index.html                          Accueil
├── prestations.html                    Vue d'ensemble des 4 prestations
├── savoir-faire.html                   Le métier et l'approche de Pierrick
├── avis.html                           Témoignages clients
├── contact.html                        Formulaire et coordonnées
├── prestations/
│   ├── peinture-airless.html           Détail : peinture Airless
│   ├── enduisage-airless.html          Détail : ratissage (enduisage Airless)
│   ├── jointoiement-mecanise.html      Détail : jointoiement mécanisé
│   └── enduit-projete.html             Détail : enduit projeté granité
├── assets/
│   ├── css/
│   │   └── style.css                   Toute la mise en forme
│   ├── js/
│   │   └── main.js                     Menu mobile, année du footer, formulaire
│   └── img/
│       ├── logo-pgstyle.svg            Logo complet (hero, footer)
│       ├── logo-pgstyle-nav.svg        Logo horizontal (navbar)
│       └── autocollant.svg             Visuel véhicule (référence)
└── README.md
```

L'arborescence des pages détail sous `prestations/` reproduit les URL prévues pour le site final (`/prestations/peinture-airless`, etc.).

## Charte graphique

| Rôle | Couleur |
|------|---------|
| Bleu profond (identité, fonds) | `#14385C` |
| Bleu principal (titres) | `#1C5882` |
| Bleu vif (boutons, liens) | `#2F7BA8` |
| Bleu doux | `#7EBCCE` |
| Bleu pâle | `#AFD3DA` |
| Gris texte | `#5C5F60` |

Signature visuelle récurrente : l'éventail nuancier repris du logo.

## À valider avec Pierrick

- Chiffres placeholders : « 16 ans », « 48 h », « 100 % devis gratuits ».
- Photos : tous les emplacements « à venir » (machines, chantiers, avant/après).
- Témoignages : actuellement des exemples, à remplacer par de vrais avis.
- Section Savoir-faire : à enrichir après l'interview (parcours, anecdotes).
- Textes des 4 prestations : humanisés à partir de ses documents, à relire avec lui.

## Passage au site final

Le site définitif sera construit en PHP (stack OVH). Cette maquette fournit le design, la structure de navigation et le contenu rédactionnel de référence. Le CSS (`assets/css/style.css`) et les logos sont directement réutilisables.

---

© PG Style. Maquette réalisée par TakeASite.
