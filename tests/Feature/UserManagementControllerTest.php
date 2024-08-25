<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserManagementControllerTest extends TestCase
{
   public function test_index_when_dont_have_permission()
   {
       $response = $this->get(route('user-management.index'));
       $response->assertStatus(302);
       $response->assertRedirect(route('login'));
   }

   public function test_index_when_have_permission()
   {
       $users = User::factory()->create();

       $response = $this->actingAs($users)->get(route('user-management.index'));
       $response->assertStatus(200);
       $response->assertViewHas('users');
       $response->assertViewIs('users.index');
   }
}
