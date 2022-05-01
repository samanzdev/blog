<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
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

        $this
            ->get(route('admin.posts.index'))
            ->assertOk()
            ->assertViewIs('admin.post.index')
            ->assertViewHas('post', Post::with(['user', 'category'])->orderBy('id', 'DESC')->paginate(10));
    }

    public function testCreateMethod()
    {
        Post::factory()->count(10)->create();

        $this
            ->get(route('admin.posts.create'))
            ->assertOk()
            ->assertViewIs('admin.post.create')
            ->assertViewHas('category', Category::orderBy('id', 'DESC')->get());
    }

    public function testEditMethod()
    {
        $post = Post::factory()->create();
        Category::factory()->count(10)->create();

        $this
            ->get(route('admin.posts.edit', $post->id))
            ->assertOk()
            ->assertViewIs('admin.post.edit')
            ->assertViewHasAll([
                'category' => Category::orderBy('id', 'DESC')->get(),
                'post' => $post
            ]);
    }
}
