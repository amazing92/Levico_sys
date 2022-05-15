<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\lab;

class labApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_lab()
    {
        $lab = lab::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/labs', $lab
        );

        $this->assertApiResponse($lab);
    }

    /**
     * @test
     */
    public function test_read_lab()
    {
        $lab = lab::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/labs/'.$lab->id
        );

        $this->assertApiResponse($lab->toArray());
    }

    /**
     * @test
     */
    public function test_update_lab()
    {
        $lab = lab::factory()->create();
        $editedlab = lab::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/labs/'.$lab->id,
            $editedlab
        );

        $this->assertApiResponse($editedlab);
    }

    /**
     * @test
     */
    public function test_delete_lab()
    {
        $lab = lab::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/labs/'.$lab->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/labs/'.$lab->id
        );

        $this->response->assertStatus(404);
    }
}
