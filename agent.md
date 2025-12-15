# Agent Instructions — Alpemania.github.io

Objectif
- Fournir un site statique (GitHub Pages compatible) avec un header, un bloc central composé d'images positionnées à gauche et de texte à droite, un diaporama automatique plus bas, un formulaire de contact, et un footer avec liens GitHub/LinkedIn et un PDF `resume.pdf`.

Contexte technique
- Le site est principalement statique et prévisualisable localement avec PHP via le routeur `.php-preview-router.php`.
- Fichiers clés:
  - `index.php` : page principale (langue FR).
  - `css/style.css` : styles globaux.
  - `Images/` : dossier contenant `image-1.svg`, `image-2.svg`, `image-3.svg` (placeholders).
  - `send_mail.php` : gestionnaire de formulaire (PHP) — nécessite configuration de `$TO`.
  - `.htaccess` : règles et en-têtes utiles pour Apache (ignoré sur GitHub Pages).
  - `resume.pdf` : fichier PDF (placeholder) relié depuis le footer.
  - `README.md` : instructions de preview et où placer les images.
  - `agent.md` (ce fichier) : directives pour les IA et journal des modifications.

Conventions et attentes
- Garder le site statique : n'ajoutez pas de dépendances serveur côté produit final sur GitHub Pages. Si vous ajoutez du PHP, incluez une note claire indiquant que c'est pour la prévisualisation locale seulement.
- Utiliser des chemins relatifs.
- Nommer les images comme `Images/image-1.svg`, `Images/image-2.svg`, `Images/image-3.svg` (remplacer par des fichiers réels si besoin).
- Le formulaire POST pointe vers `send_mail.php`. Indiquer à l'utilisateur de configurer `$TO` et d'utiliser un serveur PHP/SMTP réel si nécessaire.

Comportement attendu de l'IA
- Avant toute modification : lire `agent.md`, `index.php`, `css/style.css`, `README.md` et `.htaccess`.
- Pour chaque modification de projet (création, suppression, modification de fichiers), mettre à jour la section "Journal des modifications" ci-dessous EN AJOUTANT UNE LIGNE datée décrivant l'opération.
- Toujours mettre à jour la todo list interne (`manage_todo_list`) pour refléter l'état des tâches quand le travail est multi-étapes.
- Avant d'exécuter des commandes ou d'effectuer des écritures importantes, afficher une brève préface expliquant l'action (1-2 phrases).
- Lorsque vous ajoutez des fichiers binaires (images, PDFs), vérifier qu'ils sont créés dans `Images/` ou à la racine selon la référence dans `index.php`.

Sécurité et déploiement
- `.htaccess` est fourni pour Apache. Ne pas compter sur son exécution sur GitHub Pages.
- Ne pas inclure d'informations sensibles (emails en clair) dans le dépôt public. Utiliser des variables d'environnement sur un serveur privé.

Journal des modifications (AI must append entries here)
- 2025-12-15 — Création initiale du site : `index.php`, `css/style.css`, `send_mail.php`, `.htaccess`, `README.md`.
- 2025-12-15 — Ajout de placeholders SVG : `Images/image-1.svg`, `Images/image-2.svg`, `Images/image-3.svg`. Mise à jour de `index.php` pour référencer les SVG.
- 2025-12-15 — Génération de `agent.md` (ce fichier) et création d'un `resume.pdf` placeholder.

Notes pour le prochain agent
- Confirmez localement le rendu en lançant :
```
php -S 127.0.0.1:8000 .php-preview-router.php
```
- Si vous remplacez les SVG par des JPEG/PNG, mettez à jour `index.php` en conséquence.

Fin.
