<?php namespace Tests\Repositories;

use App\Models\lab;
use App\Repositories\labRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class labRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var labRepository
     */
    protected $labRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->labRepo = \App::make(labRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_lab()
    {
        $lab = lab::factory()->make()->toArray();

        $createdlab = $this->labRepo->create($lab);

        $createdlab = $createdlab->toArray();
        $this->assertArrayHasKey('id', $createdlab);
        $this->assertNotNull($createdlab['id'], 'Created lab must have id specified');
        $this->assertNotNull(lab::find($createdlab['id']), 'lab with given id must be in DB');
        $this->assertModelData($lab, $createdlab);
    }

    /**
     * @test read
     */
    public function test_read_lab()
    {
        $lab = lab::factory()->create();

        $dblab = $this->labRepo->find($lab->id);

        $dblab = $dblab->toArray();
        $this->assertModelData($lab->toArray(), $dblab);
    }

    /**
     * @test update
     */
    public function test_update_lab()
    {
        $lab = lab::factory()->create();
        $fakelab = lab::factory()->make()->toArray();

        $updatedlab = $this->labRepo->update($fakelab, $lab->id);

        $this->assertModelData($fakelab, $updatedlab->toArray());
        $dblab = $this->labRepo->find($lab->id);
        $this->assertModelData($fakelab, $dblab->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_lab()
    {
        $lab = lab::factory()->create();

        $resp = $this->labRepo->delete($lab->id);

        $this->assertTrue($resp);
        $this->assertNull(lab::find($lab->id), 'lab should not exist in DB');
    }
}
