<?php
namespace App\BusinessRules\Base\Commands\tests;

use Illuminate\Console\Command;

class MakeServicesTests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom_services_tests {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make all custom services test for a model';

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
        $name = $this->argument('name');

        $this->call('make:custom_getall_service_test', [ 'name' => $name]);
        $this->call('make:custom_create_service_test', [ 'name' => $name]);
        $this->call('make:custom_delete_service_test', [ 'name' => $name]);
        $this->call('make:custom_update_service_test', [ 'name' => $name]);
        $this->call('make:custom_getbyid_service_test', [ 'name' => $name]);
    }
}
