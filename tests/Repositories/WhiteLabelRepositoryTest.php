<?php namespace Tests\Repositories;

use App\Models\WhiteLabel;
use App\Repositories\WhiteLabelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class WhiteLabelRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var WhiteLabelRepository
     */
    protected $whiteLabelRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->whiteLabelRepo = \App::make(WhiteLabelRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_white_label()
    {
        $whiteLabel = WhiteLabel::factory()->make()->toArray();

        $createdWhiteLabel = $this->whiteLabelRepo->create($whiteLabel);

        $createdWhiteLabel = $createdWhiteLabel->toArray();
        $this->assertArrayHasKey('id', $createdWhiteLabel);
        $this->assertNotNull($createdWhiteLabel['id'], 'Created WhiteLabel must have id specified');
        $this->assertNotNull(WhiteLabel::find($createdWhiteLabel['id']), 'WhiteLabel with given id must be in DB');
        $this->assertModelData($whiteLabel, $createdWhiteLabel);
    }

    /**
     * @test read
     */
    public function test_read_white_label()
    {
        $whiteLabel = WhiteLabel::factory()->create();

        $dbWhiteLabel = $this->whiteLabelRepo->find($whiteLabel->id);

        $dbWhiteLabel = $dbWhiteLabel->toArray();
        $this->assertModelData($whiteLabel->toArray(), $dbWhiteLabel);
    }

    /**
     * @test update
     */
    public function test_update_white_label()
    {
        $whiteLabel = WhiteLabel::factory()->create();
        $fakeWhiteLabel = WhiteLabel::factory()->make()->toArray();

        $updatedWhiteLabel = $this->whiteLabelRepo->update($fakeWhiteLabel, $whiteLabel->id);

        $this->assertModelData($fakeWhiteLabel, $updatedWhiteLabel->toArray());
        $dbWhiteLabel = $this->whiteLabelRepo->find($whiteLabel->id);
        $this->assertModelData($fakeWhiteLabel, $dbWhiteLabel->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_white_label()
    {
        $whiteLabel = WhiteLabel::factory()->create();

        $resp = $this->whiteLabelRepo->delete($whiteLabel->id);

        $this->assertTrue($resp);
        $this->assertNull(WhiteLabel::find($whiteLabel->id), 'WhiteLabel should not exist in DB');
    }
}
