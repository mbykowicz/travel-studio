<?php

namespace App\Actions\Clients;

use App\Events\ClientUpdated;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class UpdateClientAction
{
    public function execute(Client $client, array $data): Client
    {
        DB::transaction(function () use ($client, $data): void {
            $client->update($data);
        });
        event(new ClientUpdated($client));

        return $client;
    }
}
