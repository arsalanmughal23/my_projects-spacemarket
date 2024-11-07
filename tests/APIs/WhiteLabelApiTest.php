<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\WhiteLabel;

class WhiteLabelApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_white_label()
    {
        $whiteLabel = WhiteLabel::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/white_labels', $whiteLabel
        );

        $this->assertApiResponse($whiteLabel);
    }

    /**
     * @test
     */
    public function test_read_white_label()
    {
        $whiteLabel = WhiteLabel::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/white_labels/'.$whiteLabel->id
        );

        $this->assertApiResponse($whiteLabel->toArray());
    }

    /**
     * @test
     */
    public function test_update_white_label()
    {
        $whiteLabel = WhiteLabel::factory()->create();
        $editedWhiteLabel = WhiteLabel::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/white_labels/'.$whiteLabel->id,
            $editedWhiteLabel
        );

        $this->assertApiResponse($editedWhiteLabel);
    }

    /**
     * @test
     */
    public function test_delete_white_label()
    {
        $whiteLabel = WhiteLabel::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/white_labels/'.$whiteLabel->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/white_labels/'.$whiteLabel->id
        );

        $this->response->assertStatus(404);
    }
}
