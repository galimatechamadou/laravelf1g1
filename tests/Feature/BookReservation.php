<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservation extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     *//* 
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    } */
    /** @test */
    public function add_book(){
        $this->withoutExceptionHandling();

        $response = $this->post('books',[
            'title' => "The good book",
            "autho" => "The author"
        ]);

        $this->assertOk();
        $this->assertCount(1, Book::all())
    }
}
