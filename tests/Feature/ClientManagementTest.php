<?php

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

uses(RefreshDatabase::class);

it('has correct clients table structure', function () {
    expect(Schema::hasTable('clients'))->to;

    expect(Schema::hasColumns('clients', [
        'id', 'uuid', 'name', 'phone', 'email', 'created_at', 'updated_at',
    ]))->toBeTrue();
});

it('can create a client with a factory', function () {
    $client = Client::factory()->create();

    expect($client)->toBeInstanceOf(Client::class)
        ->and($client->id)->not->toBeNull()
        ->and($client->uuid)->not->toBeNull()
        ->and($client->name)->toBeString();
});

it('can insert a client into the database', function () {
    $client = Client::create([
        'name' => 'John Doe',
        'phone' => '123456789',
        'email' => 'john@example.com',
    ]);

    expect(Client::find($client->id))->not->toBeNull();
});

it('can update a client', function () {
    $client = Client::factory()->create(['name' => 'Old Name']);

    $client->update(['name' => 'New Name']);

    expect($client->fresh()->name)->toBe('New Name');
});

it('can delete a client', function () {
    $client = Client::factory()->create();

    $client->delete();

    expect(Client::find($client->id))->toBeNull();
});

it('allows nullable phone and email', function () {
    $client = Client::factory()->create([
        'phone' => null,
        'email' => null,
    ]);

    expect($client->phone)->toBeNull()
        ->and($client->email)->toBeNull();
});
