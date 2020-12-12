<?php

namespace App\BusinessRules\Base\Tests\Commands;

use App\BusinessRules\Base\Tests\Commands\CommandsTestCase;

class MakeAllCommandTest extends CommandsTestCase
{
    public function test_commands_was_registered()
    {
        $this->artisan('check_if_commands_exists')
            ->assertExitCode(1);
    }
}
