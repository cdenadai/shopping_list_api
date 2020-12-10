<?php
namespace App\BusinessRules\Base\Commands\tests;

use Illuminate\Console\Command;

class MakeAllTests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom_all_tests {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make model, controller, service and validator tests';

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

        $this->call('make:custom_test_case', [ 'name' => $name]);
        $this->call('make:custom_services_tests', [ 'name' => $name]);
        $this->call('make:custom_validator_test', [ 'name' => $name]);
        $this->call('make:custom_controllers_tests', [ 'name' => $name]);
        $this->call('make:custom_routes_test', [ 'name' => $name]);
    }
}
