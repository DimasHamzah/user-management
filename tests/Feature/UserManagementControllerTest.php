<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserManagementControllerTest extends TestCase
{
   public function test_index_when_dont_have_permission()
   {
       $response = $this->get('/user-management');
       $response->assertStatus(403);
       $response->assertStatus('/login');
   }
}
