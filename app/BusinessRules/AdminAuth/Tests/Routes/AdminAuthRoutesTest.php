<?php

namespace App\BusinessRules\AdminAuth\Tests\Routes;

use App\BusinessRules\AdminAuth\Tests\AdminAuthTestCase;

class AdminAuthRoutesTest extends AdminAuthTestCase
{
    protected $baseURL;

    protected function setUp(): void
    {
        parent::setUp();
        $this->baseURL = env('APP_URL');
    }

	/** @test */
    public function should_exist_signin_route(){
        $route = route('adminAuth.signin');
        $this->assertEquals($this->baseURL.'/api/admin/auth/signin', $route);
    }
}
