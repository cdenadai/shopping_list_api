<?php

namespace App\BusinessRules\Admin\Tests\Gates;

use App\Models\User;
use App\BusinessRules\Admin\Tests\AdminTestCase;

class AdminGateTest extends AdminTestCase
{
    protected $gate;
    protected $adminUser;
    protected $operatorUser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->gate = resolve('App\BusinessRules\Admin\Gates\AdminGate');
        $this->adminUser = $this->makeFakeAdminUser();
        $this->operatorUser = $this->makeFakeOperatorUser();
    }

	/** @test */
    public function should_authorize_create()
    {
        $authorized = $this->actingAs($this->operatorUser)
                           ->gate
                           ->authorize('create');

        $this->assertTrue($authorized);
    }

    /** @test */
    public function should_unauthorize_update()
    {
        $this->expectException(\Illuminate\Auth\Access\AuthorizationException::class);
        $this->expectedExceptionCode = 403;

        $authorized = $this->actingAs($this->operatorUser)
                           ->gate
                           ->authorize('update');

        $this->assertFalse($authorized);
    }

    /** @test */
    public function should_authorize_update()
    {
        $authorized = $this->actingAs($this->adminUser)->gate->authorize('update');
        $this->assertTrue($authorized);
    }

    /** @test */
    public function should_unauthorize_delete()
    {
        $this->expectException(\Illuminate\Auth\Access\AuthorizationException::class);
        $this->expectedExceptionCode = 403;

        $authorized =  $this->actingAs($this->operatorUser)
                            ->gate
                            ->authorize('delete');
        $this->assertFalse($authorized);
    }

    /** @test */
    public function should_authorize_delete()
    {
        $authorized = $this->actingAs($this->adminUser)->gate->authorize('delete');
        $this->assertTrue($authorized);
    }

    /** @test */
    public function should_unauthorize_getById()
    {
        $this->expectException(\Illuminate\Auth\Access\AuthorizationException::class);
        $this->expectedExceptionCode = 403;

        $authorized =  $this->actingAs($this->operatorUser)
                            ->gate
                            ->authorize('delete');
        $this->assertFalse($authorized);
    }

    /** @test */
    public function should_authorize_getById()
    {
        $authorized = $this->actingAs($this->adminUser)->gate->authorize('view');
        $this->assertTrue($authorized);
    }

    /** @test */
    public function should_unauthorize_getAll()
    {
        $this->expectException(\Illuminate\Auth\Access\AuthorizationException::class);
        $this->expectedExceptionCode = 403;

        $authorized =  $this->actingAs($this->operatorUser)
                            ->gate
                            ->authorize('delete');
        $this->assertFalse($authorized);
    }

    /** @test */
    public function should_authorize_getAll()
    {
        $authorized = $this->actingAs($this->adminUser)->gate->authorize('viewAny');
        $this->assertTrue($authorized);
    }
}
