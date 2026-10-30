<?php

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

it('seeds sample accounts for the supported roles', function () {
    (new UserSeeder)->run();

    expect(User::where('role', 'admin')->where('email', 'admin@mubs.ac.ug')->exists())->toBeTrue()
        ->and(User::where('role', 'lecturer')->where('email', 'lecturer@mubs.ac.ug')->exists())->toBeTrue()
        ->and(User::where('role', 'student')->where('email', 'student@mubs.ac.ug')->exists())->toBeTrue()
        ->and(Hash::check('password', User::where('email', 'admin@mubs.ac.ug')->firstOrFail()->password))->toBeTrue();
});

it('can be run repeatedly without creating duplicate sample accounts', function () {
    $seeder = new UserSeeder;
    $seeder->run();
    $accountCount = User::count();

    $seeder->run();

    expect(User::count())->toBe($accountCount);
});
