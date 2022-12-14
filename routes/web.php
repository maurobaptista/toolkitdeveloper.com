<?php

use App\Http\Controllers\SitemapController;
use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

Route::inertia('/', 'HomePage', [
    'tools' => config('tools'),
])->name('homepage');

Route::group([
    'prefix' => 'tools/',
    'as' => 'tools.',
], function () {
    foreach (config('tools') as $tool => $data) {
        Route::inertia('/' . $tool, $data['component'], $data)->name($tool);
    }
    Route::post('/{tool}', ToolController::class)->name('handler');
});
