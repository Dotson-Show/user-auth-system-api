<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * User Login Test.
     *
     * @return void
     */
    public function testUserLogin()
    {
        $this->json('POST', '/user/login', [
            'email' => 'bobbyboo@test.com',
            'password' => 'bobbyboopass'
            ])
             ->seeJson([
                'success' => true,
             ]);
    }
}
