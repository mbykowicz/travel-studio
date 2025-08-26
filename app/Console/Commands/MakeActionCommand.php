<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeActionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:action {name} {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Action class';

    /**
     * Execute the console command.
     */
    public function handle(Filesystem $fs)
    {
        $name = $this->argument('name');
        $model = $this->option('model');

        $path = app_path('Actions/'.$name.'.php');

        if ($fs->exists($path)) {
            $this->error('❌ {$name} already exists!');

            return;
        }

        $dir = dirname($path);
        if (! $fs->isDirectory($dir)) {
            $fs->makeDirectory($dir, 0755, true);
        }

        $namespace = 'App\\Actions';
        $className = basename($name);
        $subDir = dirname($name);

        if ($subDir !== '.') {
            $namespace .= '\\'.str_replace('/', '\\', $subDir);
        }

        if ($model) {
            $stub = <<<PHP
        <?php

        namespace {$namespace};

        use App\Models\\$model;

        class {$className}
        {
            public function execute(array \$data): $model
            {
                //
            }
        }
        PHP;
        } else {
            $stub = <<<PHP
        <?php

        namespace {$namespace};

        class {$className}
        {
            public function execute(array \$data): void
            {
                //
            }
        }
        PHP;
        }

        $fs->put($path, $stub);
        $this->info("✅ Action created: {$path}");
    }
}
