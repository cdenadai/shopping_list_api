<?php
namespace App\BusinessRules\Base\Commands;

use Illuminate\Console\Command;

class MakeServices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom_services {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make all custom services for a model';

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

        $this->call('make:custom_getall_service', [ 'name' => $name]);
        $this->call('make:custom_create_service', [ 'name' => $name]);
        $this->call('make:custom_delete_service', [ 'name' => $name]);
        $this->call('make:custom_update_service', [ 'name' => $name]);
        $this->call('make:custom_getbyid_service', [ 'name' => $name]);
    }
}
