<?php
namespace App\BusinessRules\Base\Commands;

use Illuminate\Console\Command;

class MakeControllers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom_controllers {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make all custom controllers for a model';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $modelName = $this->argument('name');

        $this->call('make:custom_getall_controller', [ 'name' => $modelName]);
        $this->call('make:custom_create_controller', [ 'name' => $modelName]);
        $this->call('make:custom_delete_controller', [ 'name' => $modelName]);
        $this->call('make:custom_update_controller', [ 'name' => $modelName]);
        $this->call('make:custom_getbyid_controller', [ 'name' => $modelName]);
    }
}
