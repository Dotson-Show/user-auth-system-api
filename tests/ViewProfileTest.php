<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class ViewProfileTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testViewProfile()
    {
        $this->json('POST', '/user/login', [
            'email' => 'bobbyboo@test.com',
            'password' => 'bobbyboopass'
            ])
             ->seeJson([
                'success' => true,
             ]);

        $user = Auth::guard('user')->user()

        $this->actingAs($user)
             ->get('/user');
    }
}
