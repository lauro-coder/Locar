<?php

use App\Models\Vehicle;

test('pagina de veiculos mostra apenas os disponiveis', function () {

    $disponivel = Vehicle::factory()->create([
        'model' => 'CorollaTeste',
        'available' => true
    ]);

    $indisponivel = Vehicle::factory()->create([
        'model' => 'CivicTeste',
        'available' => false
    ]);

    $response = $this->get('/veiculos');

    $response->assertOk();

    $response->assertSee($disponivel->model);

    $response->assertDontSee($indisponivel->model);

});