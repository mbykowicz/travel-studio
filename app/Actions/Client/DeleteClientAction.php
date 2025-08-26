<?php

namespace App\Actions\Clients;

use App\Events\ClientDeleted;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class DeleteClientAction
{
    public function execute(Client $client): Client
    {
        DB::transaction(function () use ($client): void {
            $client->delete();
        });
        event(new ClientDeleted($client));

        return $client;
    }
}
