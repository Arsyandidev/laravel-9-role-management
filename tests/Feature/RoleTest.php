<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_show_role_page()
    {
        $user = User::role('auditor')->get()->random();
        $this->actingAs($user)->get('dashboard/role')->assertOk();
    }

    public function test_cannot_show_role_page()
    {
        $user = User::role('user')->get()->random();
        $this->actingAs($user)->get('dashboard/role')->assertStatus(403);
    }
}
