<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_book_can_be_added_to_library()
    {
        $response = $this->withoutExceptionHandling()->post('/books',[
            'title' => 'hello',
            'author' => 'hello',
        ]);

        $response->assertOk();

        $this->assertDatabaseCount('books', 1);

        // $response->assertCreated();
    }

    /**
     * @test
     */
    public function a_title_is_required() {
        $response = $this->post('/books', [
            'title' => '',
            'author' => 'moin',
        ]);

        $response->assertSessionHasErrors(['title']);
    }

    /**
     * @test
     */
    public function can_update_a_book() {
        $this->withoutExceptionHandling();
        $book = $this->post('/books', [
            'title' => 'hello',
            'author' => 'hello',
        ]);

        $book = Book::first();

        $this->assertDatabaseCount('books', 1);

        $response = $this->put('/books/'.$book->id, [
            'title' => 'hi',
            'author' => 'moin',
        ]);

        $this->assertEquals("hi", Book::first()->title);
        $this->assertEquals("moin", Book::first()->author);
    }
}
