# Copilot instructions — Alpemania.github.io

Purpose: Help AI agents make small, safe edits to this personal GitHub Pages site.

Big picture
- This repository is a user-site repo (name ends with `.github.io`) and is served as a static site by GitHub Pages.  Server-side PHP will NOT run on GitHub Pages — PHP here is used for local preview only.
- Key files: `index.php` (root page HTML skeleton), `.php-preview-router.php` (local preview router that serves files, handles POST echoing, CORS, and optional debug info), and `README.md` (project description).

Local development & preview (must be followed before testing PHP)
- Start the PHP built-in server with the custom router:
- `php -S 127.0.0.1:8000 .php-preview-router.php`
- The router behavior you can rely on:
  - Returns JSON echo for `POST` requests (useful for testing forms).
  - Handles `OPTIONS` and sets permissive CORS headers.
  - Maps common extensions to content-types (html, css, js, images).
  - When serving `.php`, it includes the file and, if `?debug` is present, appends a JSON-style debug comment.

Conventions & constraints for edits
- Keep changes compatible with static-hosting: do not add server-dependent features that assume GitHub Pages executes PHP. If you add PHP, also add clear preview instructions and a note that the file will be inactive on GitHub Pages.
- Use relative paths for assets and links (site expects files at repository root).
- `index.php` currently uses `lang="fr"` — preserve language unless the user asks otherwise.

When generating or modifying code
- Prefer small, focused PRs that are verifiable via local preview. After edits, run the PHP preview command above and open `http://127.0.0.1:8000/`.
- To test form handling, POST to an endpoint and verify the router echoes `data` and `files` back as JSON.
- If adding JS/CSS, ensure correct content type by using standard file extensions (the router maps common types).

Files to inspect for context
- `index.php` — main page skeleton and language setting
- `.php-preview-router.php` — local preview behavior (CORS, POST echo, debug param)
- `README.md` — project intent (portfolio)

Do not assume
- That PHP will run after pushing to GitHub; treat the repo as static for deployment.

If unclear or you need more context, ask the repo owner whether they expect server-side rendering on deployment or only local preview.

---
This file was generated to help AI code assistants be productive quickly; please tell me if any sections need more detail.
