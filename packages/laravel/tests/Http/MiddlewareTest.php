<?php

use Aminevg\HybridlyLocaleSwitcher\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Aminevg\HybridlyLocaleSwitcher\Tests\UsesSessionStore;

use function Pest\Laravel\withHeader;

uses(UsesSessionStore::class);

beforeEach(function () {
    Route::get('/', fn () => ['sample' => 'response'])
        ->middleware(Middleware::class);
    session()->flush();
    config(['app.locale' => 'testLocale']);
});

it('sets the locale ', function () {
    withHeader('Accept-Language', 'ja')->get('/');
    expect(app()->getLocale())->toBe('ja');
});

it('remembers the locale once set', function () {
    withHeader('Accept-Language', 'en')->get('/');
    withHeader('Accept-Language', 'ja')->get('/');
    expect(app()->getLocale())->toBe('en');
});
