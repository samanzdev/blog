<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexMethod()
    {
        Category::factory()->count(10)->create();

        $this
            ->get(route('admin.categories.index'))
            ->assertOk()
            ->assertViewIs('admin.category.index')
            ->assertViewHas('category', Category::orderBy('id', 'DESC')->paginate(10));
    }
}
