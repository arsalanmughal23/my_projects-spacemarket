<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Cms;

class CmsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cm()
    {
        $cms = Cms::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cms', $cms
        );

        $this->assertApiResponse($cms);
    }

    /**
     * @test
     */
    public function test_read_cm()
    {
        $cms = Cms::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cms/'.$cms->id
        );

        $this->assertApiResponse($cms->toArray());
    }

    /**
     * @test
     */
    public function test_update_cm()
    {
        $cms = Cms::factory()->create();
        $editedCm = Cms::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cms/'.$cms->id,
            $editedCm
        );

        $this->assertApiResponse($editedCm);
    }

    /**
     * @test
     */
    public function test_delete_cm()
    {
        $cms = Cms::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cms/'.$cms->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cms/'.$cms->id
        );

        $this->response->assertStatus(404);
    }
}
