<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    /**
     * User Registration Test.
     *
     * @return void
     */
    public function testUserRegistration()
    {
        $this->json('POST', '/user/register', [
            'name' => 'Bobby Boo',
            'email' => 'bobbyboo@test.com',
            'password' => 'bobbyboopass'
            ])
             ->seeJsonEquals([
                'success' => true,
                'message' => 'registration completed successfully'
             ]);
    }
}
