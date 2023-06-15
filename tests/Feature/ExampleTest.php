<?php

use App\Http\Services\GameServiceInterface;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\{Laravel\get, Laravel\partialMock};

// Example test
it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

// json expectation
it('can return games', function () {
   $response = get('/api/games')->assertStatus(200);

   expect($response->getContent())
     ->toContain('"name":"Call of Duty: Modern Warfare 2"');
});

// Backward compatibility
it('can return call of duty', function () {
    $response = get('/api/games')->assertStatus(200);

    $response->assertJsonFragment([
        'name' => 'Call of Duty: Modern Warfare 2',
    ]);
});

// Database seeding
uses(RefreshDatabase::class);

// Lifecycle hooks
beforeEach(function () {
    // Do something...
});
afterEach(function () {
    // Do something...
});
beforeAll(function () {
    // Do something before all the tests run...
});
afterAll(function () {
    // Do something after all the tests run...
});

// Helpers
it('can get a user', function () {
    $user = createUser([
        'name' => 'John Doe',
    ]);

    expect($user)
        ->toBeInstanceOf(User::class)
        ->and($user->name)
        ->toBe('John Doe');
});
it('should equal pest', fn () => expect('Pest')->toEqualPest());

// Something for Ben
it('can match values', function () {
    expect('Steve')
        ->match('minecraft', [
            'zelda' => fn ($character) => $character->toBe('Link'),
            'minecraft' => fn ($character) => $character->toBe('Steve'),
            'mario' => fn ($character) => $character->toBe('Mario'),
        ]);
});

// Higher order testing
it('will not use debugging functions')
    ->expect(['dd', 'dump'])
    ->each->not->toBeUsed();

// Mocking
it('will mock games', function () {
   partialMock(GameServiceInterface::class)
       ->shouldReceive('getGames')
       ->once()
       ->andReturn([
           'Minecraft',
           'Call of Duty',
           'FIFA',
           'Overwatch',
       ]);

    $response = get('/api/games');

    expect($response->getContent())
        ->toContain('FIFA');
});

// Code coverage




