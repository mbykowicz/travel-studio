<?php

namespace App\Http\Controllers;

use App\Actions\Clients\CreateClientAction;
use App\Actions\Clients\DeleteClientAction;
use App\Actions\Clients\UpdateClientAction;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Client::class);

        $clients = Client::query()->latest()->paginate(25);

        return Inertia::render('clients/index', [
            'clients' => $clients->toResourceCollection(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request, CreateClientAction $action)
    {
        Gate::authorize('create', Client::class);

        $client = $action->execute($request->validated());

        return redirect()->route('clients.show', $client->uuid)->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        Gate::authorize('view', $client);

        return Inertia::render('clients/show', [
            'client' => $client->toResource(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client, UpdateClientAction $action)
    {
        Gate::authorize('update', $client);

        $result = $action->execute($client, $request->validated());

        return back()->with([
            'success' => 'Client updated successfully.',
            'client' => $client->fresh()->toResource(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client, DeleteClientAction $action)
    {
        Gate::authorize('delete', $client);

        $result = $action->execute($client);

        return redirect()->route('clients.index')->with('success', 'Client has been deleted.');
    }
}
