<?php
namespace App\BusinessRules\Base\Commands\tests;

use Illuminate\Console\Command;

class MakeControllersTests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom_controllers_tests {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make all custom controllers tests';

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

        $this->call('make:custom_getall_controller_test', [ 'name' => $modelName]);
        $this->call('make:custom_create_controller_test', [ 'name' => $modelName]);
        $this->call('make:custom_delete_controller_test', [ 'name' => $modelName]);
        $this->call('make:custom_update_controller_test', [ 'name' => $modelName]);
        $this->call('make:custom_getbyid_controller_test', [ 'name' => $modelName]);
    }
}
