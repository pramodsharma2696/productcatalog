<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase; // Resets database after each test

    public function test_can_list_categories()
    {
        Category::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/categories');
        $response->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }

    public function test_can_create_category()
    {
        $data = [
            'name' => 'New Category',
            'description' => 'Category Description',
            'parent_category_id' => null,
        ];

        $response = $this->postJson('/api/v1/categories', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'New Category']);
        
    }

    public function test_can_fetch_single_category()
    {
        $category = Category::factory()->create();

        $response = $this->getJson("/api/v1/categories/{$category->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => $category->name]);
    }

    public function test_can_update_category()
    {
        $category = Category::factory()->create();

        $data = ['name' => 'Updated Name'];

        $response = $this->putJson("/api/v1/categories/{$category->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Updated Name']);
    }

    public function test_can_delete_category()
    {
        $category = Category::factory()->create();

        $response = $this->deleteJson("/api/v1/categories/{$category->id}");

        $response->assertStatus(200);
    }
}
