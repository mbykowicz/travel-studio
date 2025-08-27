<?php

namespace App\Actions\Clients;

use App\Events\ClientDeleted;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class DeleteClientAction
{
    public function execute(Client $client): int
    {
        $result = DB::transaction(function () use ($client): int {
            return $client->delete();
        });
        event(new ClientDeleted($client));

        return $result;
    }
}
