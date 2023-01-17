<?php

use Aminevg\HybridlyLocaleSwitcher\Http\Middleware;
use Aminevg\HybridlyLocaleSwitcher\Tests\User;
use Illuminate\Support\Facades\Route;
use Aminevg\HybridlyLocaleSwitcher\Tests\UsesDatabaseStore;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\withHeader;

uses(UsesDatabaseStore::class);
uses(RefreshDatabase::class);

beforeEach(function () {
    Route::get('/', fn () => ['sample' => 'response'])
        ->middleware(Middleware::class);
    config(['app.locale' => 'testLocale']);
    actingAs(User::create([
        'name' => 'Test User',
        'email' => 'test@email.com',
        'password' => 'password',
    ]));
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
