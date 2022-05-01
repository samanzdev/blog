<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;

class PostTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model(): Model
    {
        return new Post();
    }

    public function testPostRelationshipWithUser()
    {
        $post = Post::factory()->for(User::factory())->create();

        $this->assertTrue(isset($post->user->id));
        $this->assertTrue($post->user instanceof User);
    }
}
