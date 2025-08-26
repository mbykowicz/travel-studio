<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeFeatureCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:feature {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate model, migration, factory, resource controller, requests, policy, and resource';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $model = $this->argument('model');
        $resource = $model.'Resource';

        // Run the chained commands
        $this->call('make:model', [
            'name' => $model,
            '-m' => true,
            '-f' => true,
            '-c' => true,
            '-r' => true,
            '--requests' => true,
            '--policy' => true,
        ]);

        $this->call('make:resource', [
            'name' => $resource,
        ]);

        $this->call('make:action', [
            'name' => $model.'/Create'.$model.'Action',
            '--model' => $model,
        ]);

        $this->call('make:action', [
            'name' => $model.'/Update'.$model.'Action',
            '--model' => $model,
        ]);

        $this->call('make:action', [
            'name' => $model.'/Delete'.$model.'Action',
            '--model' => $model,
        ]);

        $this->info("✅ Feature scaffolding for {$model} created successfully!");
    }
}
