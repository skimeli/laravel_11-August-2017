<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Box;
class BasicTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHasItemInBox()
    {
        $box = new Box(['pen', 'pencil', 'book']);

        $this->assertTrue($box->has('pencil'));
        $this->assertFalse($box->has('jacket'));
    }
}
