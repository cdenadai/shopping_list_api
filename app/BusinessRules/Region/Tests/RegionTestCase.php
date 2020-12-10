<?php

namespace App\BusinessRules\Region\Tests;

use App\BusinessRules\Region\Models\Region;
use Tests\TestCase;

class RegionTestCase extends TestCase
{
    public function validCreationForm() {
        return [
            'name' => 'test',
            'location' => 'POINT(-22.260357, -48.550854)'
        ];
    }

    public function makeFakeRegion()
    {
        return Region::factory()->count(1)->create()->first();
    }
}
