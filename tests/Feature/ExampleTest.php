<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('should be able to use database', function () {
    $user = User::create([
        'name' => $name = fake()->firstName(),
        'email' => $email = fake()->email(),
        'password' => Hash::make('password'),
    ]);

    $this->assertDatabaseHas('users', [
        'name' => $name,
        'email' => $email,
    ]);

    $this->assertDatabaseCount('users', 1);

    expect($name)->toBe($user->name);
});
