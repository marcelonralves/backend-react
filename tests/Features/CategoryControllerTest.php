<?php

namespace Features;

use App\Models\Category;

class CategoryControllerTest extends \TestCase
{
   public function test_if_route_get_categories_is_working(){
        $this->get('/categories');
        $this->assertResponseOk();
    }

    public function test_if_user_can_post_a_category()
    {
        $payload = Category::factory()->make();

        $this->post('/categories/new', [
        'name' => $payload->name]);

        $this->assertResponseOk();
        $this->seeInDatabase('categories', [
          'name' => $payload->name
        ]);

    }
}
