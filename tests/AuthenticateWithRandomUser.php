<?php
/**
 * Created by PhpStorm.
 * User: kevint
 * Date: 4/24/2019
 * Time: 10:18 PM
 */

namespace Tests;


use App\User;

trait AuthenticateWithRandomUser
{

    protected $user;

    public function authenticate() {

        $this->user = User::inRandomOrder()->first();

        auth()->login($this->user);

    }

    public function logout()
    {
        auth()->logout();
    }

}
