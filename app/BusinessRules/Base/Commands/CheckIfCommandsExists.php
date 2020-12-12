<?php
namespace App\BusinessRules\Base\Commands;

use Illuminate\Console\Command;

class CheckIfCommandsExists extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check_if_commands_exists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test if the commands was registered';

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
        return true;
    }
}
