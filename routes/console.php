<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('portfolio:export-pages', function (): int {
    $destination = base_path('docs');
    $assetPrefix = rtrim(asset('images/'), '/').'/';
    $html = str_replace($assetPrefix, 'images/', view('home')->render());

    File::ensureDirectoryExists($destination);
    File::put($destination.'/index.html', $html);
    File::deleteDirectory($destination.'/images');
    File::copyDirectory(public_path('images'), $destination.'/images');
    File::put($destination.'/.nojekyll', '');

    $this->info('Static portfolio exported to docs/.');

    return self::SUCCESS;
})->purpose('Export the portfolio as a static GitHub Pages site');
