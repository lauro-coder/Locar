<?php

use App\Models\User;
use App\Enums\Role;

test('cliente nao pode acessar a area do administrador', function () {

    $cliente = User::factory()->create([
        'role' => Role::Cliente
    ]);

    $this->actingAs($cliente);

    $response = $this->get('/admin');

    $response->assertForbidden();

});