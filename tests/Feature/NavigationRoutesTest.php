<?php

it('serves every existing public navigation page', function (string $url, string $pageTitle) {
    $response = $this->get($url)
        ->assertOk()
        ->assertSee($pageTitle);

    expect(substr_count($response->getContent(), '<header'))->toBe(1)
        ->and(substr_count($response->getContent(), '<footer'))->toBe(1);
})->with([
    'home' => ['/', 'Every student record'],
    'contact' => ['/contact', 'Need help with your record?'],
    'contact list' => ['/contactlist', 'Contact list'],
    'login' => ['/login', 'Sign in'],
    'registration' => ['/register', 'Create your student account'],
    'password reset' => ['/forgot-password', 'Forgot your password?'],
]);

it('preselects the portal requested by the navigation link', function (string $role) {
    $this->get(route('login', ['role' => $role]))
        ->assertOk()
        ->assertSee('value="'.$role.'"', false);
})->with([
    'student',
    'lecturer',
    'admin',
]);
