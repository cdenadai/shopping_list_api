<?php
namespace App\BusinessRules\Base\Commands;

use Illuminate\Console\Command;

class MakeServiceInterfaces extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom_service_interfaces {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make all custom service interfaces for a model';

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

        $this->call('make:custom_getall_service_interface', [ 'name' => $name]);
        $this->call('make:custom_create_service_interface', [ 'name' => $name]);
        $this->call('make:custom_delete_service_interface', [ 'name' => $name]);
        $this->call('make:custom_update_service_interface', [ 'name' => $name]);
        $this->call('make:custom_getbyid_service_interface', [ 'name' => $name]);
    }
}
