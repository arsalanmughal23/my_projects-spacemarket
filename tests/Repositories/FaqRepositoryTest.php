<?php namespace Tests\Repositories;

use App\Models\Faq;
use App\Repositories\FaqRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FaqRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FaqRepository
     */
    protected $faqRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->faqRepo = \App::make(FaqRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_faq()
    {
        $faq = Faq::factory()->make()->toArray();

        $createdFaq = $this->faqRepo->create($faq);

        $createdFaq = $createdFaq->toArray();
        $this->assertArrayHasKey('id', $createdFaq);
        $this->assertNotNull($createdFaq['id'], 'Created Faq must have id specified');
        $this->assertNotNull(Faq::find($createdFaq['id']), 'Faq with given id must be in DB');
        $this->assertModelData($faq, $createdFaq);
    }

    /**
     * @test read
     */
    public function test_read_faq()
    {
        $faq = Faq::factory()->create();

        $dbFaq = $this->faqRepo->find($faq->id);

        $dbFaq = $dbFaq->toArray();
        $this->assertModelData($faq->toArray(), $dbFaq);
    }

    /**
     * @test update
     */
    public function test_update_faq()
    {
        $faq = Faq::factory()->create();
        $fakeFaq = Faq::factory()->make()->toArray();

        $updatedFaq = $this->faqRepo->update($fakeFaq, $faq->id);

        $this->assertModelData($fakeFaq, $updatedFaq->toArray());
        $dbFaq = $this->faqRepo->find($faq->id);
        $this->assertModelData($fakeFaq, $dbFaq->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_faq()
    {
        $faq = Faq::factory()->create();

        $resp = $this->faqRepo->delete($faq->id);

        $this->assertTrue($resp);
        $this->assertNull(Faq::find($faq->id), 'Faq should not exist in DB');
    }
}
