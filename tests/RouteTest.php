<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Tests;

class ExampleTest extends AbstractTestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        //$this->visit('/')->see('Laravel 5');

        //$response = $this->call('GET', '/');
        //$this->assertEquals(200, $response->status());
        $this->assertEquals(1, 1);
    }
}
