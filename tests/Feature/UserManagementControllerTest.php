<?php

namespace Tests\Feature;

use App\Mail\ConfirmationCreateUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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

   public function test_create_when_dont_have_permission()
   {
       $response = $this->get(route('user-management.create'));
       $response->assertStatus(302);
       $response->assertRedirect(route('login'));
   }

   public function test_create_when_have_permission()
   {
       $user = User::factory()->create();

       $response = $this->actingAs($user)->get(route('user-management.create'));
       $response->assertStatus(200);
       $response->assertViewIs('users.create');
   }

   public function test_store_when_dont_have_permission()
   {
       $response = $this->post(route('user-management.store'));
       $response->assertStatus(302);
       $response->assertRedirect(route('login'));
   }

   public function test_store_when_have_permission()
   {
       Mail::fake();

       $user = User::factory()->create();

       $data = [
           'name' => 'testing user',
           'email' => fake()->unique()->email,
           'password' => 'Password'
       ];

       $response = $this->actingAs($user)->post(route('user-management.store'), $data);
       $response->assertStatus(302);
       $response->assertRedirect(route('user-management.index'));
       $response->assertSessionHas('success', 'User created successfully');

       Mail::assertQueued(ConfirmationCreateUser::class, function ($mail) use ($data) {
           return $mail->hasTo($data['email']);
       });
   }

   public function test_edit_when_dont_have_permission()
   {
       $user = User::factory()->create();

       $response = $this->get(route('user-management.edit', $user->id));

       $response->assertStatus(302);
       $response->assertRedirect(route('login'));
   }

   public function test_edit_when_have_permission()
   {
       $user = User::factory()->create();
       $response = $this->actingAs($user)->get(route('user-management.edit', $user->id));
       $response->assertStatus(200);
       $response->assertViewIs('users.edit');
       $response->assertViewHas('user');
   }

   public function test_update_when_dont_have_permission()
   {
       $response = $this->put(route('user-management.update', 1));
       $response->assertStatus(302);
       $response->assertRedirect(route('login'));
   }

   public function test_update_when_validation_errors()
   {
       $user = User::factory()->create();


       $response = $this->actingAs($user)->put(route('user-management.update', 1), []);

       $response->assertStatus(302);
       $response->assertSessionHasErrors(['name' => 'The name field is required.']);
   }

   public function test_update_when_have_permission()
   {
       $user = User::factory()->create();

       $data = [
           'name' => 'testing user',
           'email' => fake()->unique()->email,
           'password' => 'Password'
       ];

       $response = $this->actingAs($user)->put(route('user-management.update', $user->id), $data);
       $response->assertStatus(302);
       $response->assertRedirect(route('user-management.index'));
       $response->assertSessionHas('success', 'User updated successfully');
   }
}
