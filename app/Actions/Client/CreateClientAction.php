<?php

namespace App\Actions\Clients;

use App\Events\ClientCreated;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class CreateClientAction
{
    public function execute(array $data): Client
    {
        $model = DB::transaction(function () use ($data): Client {
            return Client::create($data);
        });
        event(new ClientCreated($model));

        return $model;
    }
}
