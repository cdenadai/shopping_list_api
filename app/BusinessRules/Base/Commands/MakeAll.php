<?php
namespace App\BusinessRules\Base\Commands;

use Illuminate\Console\Command;

class MakeAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom_all {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make model, controller, service, validator, provider and interfaces';

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

        $this->call('make:custom_service_interfaces', [ 'name' => $name]);
        $this->call('make:custom_validator_interface', [ 'name' => $name]);
        $this->call('make:custom_model', [ 'name' => $name]);
        $this->call('make:custom_services', [ 'name' => $name]);
        $this->call('make:custom_validator', [ 'name' => $name]);
        $this->call('make:custom_controllers', [ 'name' => $name]);
        $this->call('make:custom_provider', [ 'name' => $name]);
        $this->call('make:custom_routes', [ 'name' => $name]);
    }
}
