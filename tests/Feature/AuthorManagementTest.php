<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Author;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_author_can_be_created() {
        $this->withoutExceptionHandling();
        $this->post('/authors',[
            'name' => 'moin',
            'birth_date' => '20-10-2022',
        ]);
        $this->assertDatabaseCount('authors', 1);
        $author = Author::first();
        $this->assertEquals('2022-10-20', $author->birth_date);

    }
}
