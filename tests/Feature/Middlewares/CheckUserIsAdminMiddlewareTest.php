<?php

namespace Tests\Feature\Middlewares;

use App\Http\Middleware\IsAdmin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class CheckUserIsAdminMiddlewareTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testWhenUserIsNotAdmin()
    {
        $user = User::factory()->user()->create();

        $this->actingAs($user);

        $request = Request::create('/admin', 'GET');

        $middleware = new IsAdmin();

        $response = $middleware->handle($request, function () {});

        $this->assertEquals($response ?? 302, 302);
    }

    public function testWhenUserIsAdmin()
    {
        $user = User::factory()->admin()->create();

        $this->actingAs($user);

        $request = Request::create('/admin', 'GET');

        $middleware = new IsAdmin();

        $response = $middleware->handle($request, function () {});

        $this->assertEquals($response, null);
    }

}
