<?php

namespace Tests\Feature\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexMethod()
    {
        Post::factory()->count(10)->create();
        $response = $this->get(route('blog.index'));

        $response->assertStatus(200);
        $response->assertViewIs('blog.index');
        $response->assertViewHas('post', Post::with(['category', 'user'])->where('is_active', 1)->orderBy('id', 'DESC')->paginate(9));
    }
}
