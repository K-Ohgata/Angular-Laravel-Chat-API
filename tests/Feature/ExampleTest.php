<?php

namespace Tests\Feature;

use App\Models\Chat;
use App\Models\Room;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function 一覧取得()
    {
        Schema::disableForeignKeyConstraints();
        $users = User::factory()->count(10)->create();
        Schema::disableForeignKeyConstraints();
        $rooms = Room::factory()->count(10)->create();
        Schema::disableForeignKeyConstraints();
        $chats = Chat::factory()->count(10)->create();
        // Schema::enableForeignKeyConstraints();
        // dd($chats->toArray());

        $response = $this->getJson('api/chats');
        // dd($response->json());

        $response
            ->assertStatus(200)
            ->assertJsonCount($chats->count());
    }
}
