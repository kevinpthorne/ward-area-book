<?php
/**
 * Created by PhpStorm.
 * User: kevint
 * Date: 4/24/2019
 * Time: 10:06 PM
 */

namespace Tests;

trait SeededDatabase
{

    public function setUp() : void
    {
        parent::setUp();
        $this->seed('TestDatabaseSeeder');
    }

}
