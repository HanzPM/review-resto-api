<?php

namespace Tests\Feature;
use App\Models\Resto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class RestoTest extends TestCase
{

    use RefreshDatabase;
 
    public function test_user_can_list_all_resto()
    {

        $count = 5;
        $data = Resto::factory()->count($count)->create();


        $this->getJson(route('restos.index'))
             ->assertOk()
             ->assertJsonCount($count);
    }

    public function test_user_can_create_resto()
    {
        $user = User::factory()->createOne();

        $data = Resto::factory()->makeOne()->toArray();

        Sanctum::actingAs($user);

        $this->postJson(route('restos.store'), $data)
        ->assertCreated();
    }

    public function test_user_can_show_resto()
    {
        $data = Resto::factory()->createOne();

        $this->getJson(route('restos.show', $data))
             ->assertOk()
             ->assertJsonStructure(['name', 'description', 'address']);
    }

    public function test_user_can_edit_resto()
    {
        $updatedData = Resto::factory()->makeOne()->toArray();
        $data = Resto::factory()->createOne();

        $this->patchJson(route('restos.update', $data), $updatedData)
             ->assertOk()
             ->assertJsonStructure(['name', 'description', 'address']);
    }

    public function test_user_can_delete_resto()
    {
        $data = Resto::factory()->createOne();

        $this->deleteJson(route('restos.destroy', $data))
             ->assertOk()
             ->assertJsonStructure(['name', 'description', 'address']);
    }

}
