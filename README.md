# Portofolio Yubel

## Publish on GitHub Pages

GitHub Pages serves the static export from `docs/`; it does not run Laravel or PHP.

1. Install the project dependencies with `composer install`.
2. Create `.env` from `.env.example` and generate the app key with `php artisan key:generate`.
3. Export the latest portfolio page with `php artisan portfolio:export-pages`.
4. Commit and push the generated `docs/` directory to GitHub.
5. In the repository, open **Settings → Pages**, choose **Deploy from a branch**, select `main` and `/docs`, then save.

After publishing, the site is available at `https://yubeixuan.github.io/Portofolio-Yubel/`.
