<?php namespace Tests\Repositories;

use App\Models\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MenuRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MenuRepository
     */
    protected $menuRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->menuRepo = \App::make(MenuRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_menu()
    {
        $menu = Menu::factory()->make()->toArray();

        $createdMenu = $this->menuRepo->create($menu);

        $createdMenu = $createdMenu->toArray();
        $this->assertArrayHasKey('id', $createdMenu);
        $this->assertNotNull($createdMenu['id'], 'Created Menu must have id specified');
        $this->assertNotNull(Menu::find($createdMenu['id']), 'Menu with given id must be in DB');
        $this->assertModelData($menu, $createdMenu);
    }

    /**
     * @test read
     */
    public function test_read_menu()
    {
        $menu = Menu::factory()->create();

        $dbMenu = $this->menuRepo->find($menu->id);

        $dbMenu = $dbMenu->toArray();
        $this->assertModelData($menu->toArray(), $dbMenu);
    }

    /**
     * @test update
     */
    public function test_update_menu()
    {
        $menu = Menu::factory()->create();
        $fakeMenu = Menu::factory()->make()->toArray();

        $updatedMenu = $this->menuRepo->update($fakeMenu, $menu->id);

        $this->assertModelData($fakeMenu, $updatedMenu->toArray());
        $dbMenu = $this->menuRepo->find($menu->id);
        $this->assertModelData($fakeMenu, $dbMenu->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_menu()
    {
        $menu = Menu::factory()->create();

        $resp = $this->menuRepo->delete($menu->id);

        $this->assertTrue($resp);
        $this->assertNull(Menu::find($menu->id), 'Menu should not exist in DB');
    }
}
