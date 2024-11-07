<?php namespace Tests\Repositories;

use App\Models\Cms;
use App\Repositories\CmsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CmsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CmsRepository
     */
    protected $cmRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cmsRepo = \App::make(CmsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cm()
    {
        $cms = Cms::factory()->make()->toArray();

        $createdCms = $this->cmsRepo->create($cms);

        $createdCms = $createdCms->toArray();
        $this->assertArrayHasKey('id', $createdCms);
        $this->assertNotNull($createdCms['id'], 'Created Cms must have id specified');
        $this->assertNotNull(Cms::find($createdCms['id']), 'Cms with given id must be in DB');
        $this->assertModelData($cms, $createdCms);
    }

    /**
     * @test read
     */
    public function test_read_cm()
    {
        $cms = Cms::factory()->create();

        $dbCm = $this->cmsRepo->find($cms->id);

        $dbCm = $dbCm->toArray();
        $this->assertModelData($cms->toArray(), $dbCm);
    }

    /**
     * @test update
     */
    public function test_update_cm()
    {
        $cms = Cms::factory()->create();
        $fakeCm = Cms::factory()->make()->toArray();

        $updatedCms = $this->cmsRepo->update($fakeCm, $cms->id);

        $this->assertModelData($fakeCm, $updatedCms->toArray());
        $dbCm = $this->cmsRepo->find($cms->id);
        $this->assertModelData($fakeCm, $dbCm->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cm()
    {
        $cms = Cms::factory()->create();

        $resp = $this->cmsRepo->delete($cms->id);

        $this->assertTrue($resp);
        $this->assertNull(Cms::find($cms->id), 'Cms should not exist in DB');
    }
}
