<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Menu;

class MenuApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_menu()
    {
        $menu = Menu::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/menus', $menu
        );

        $this->assertApiResponse($menu);
    }

    /**
     * @test
     */
    public function test_read_menu()
    {
        $menu = Menu::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/menus/'.$menu->id
        );

        $this->assertApiResponse($menu->toArray());
    }

    /**
     * @test
     */
    public function test_update_menu()
    {
        $menu = Menu::factory()->create();
        $editedMenu = Menu::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/menus/'.$menu->id,
            $editedMenu
        );

        $this->assertApiResponse($editedMenu);
    }

    /**
     * @test
     */
    public function test_delete_menu()
    {
        $menu = Menu::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/menus/'.$menu->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/menus/'.$menu->id
        );

        $this->response->assertStatus(404);
    }
}
