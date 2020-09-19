<?php

namespace Tests\Feature\Database;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    // テストデータを保存しない
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->attributes = [
            'title' => 'テスト太郎',
            'author' => 'さくしゃ',
        ];
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(
            Schema::hasColumns('books', [
                'id', 'title', 'author'
            ]),
            1
        );
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_CreateDate()
    {
        Book::create($this->attributes);
        $this->assertDatabaseHas('books', $this->attributes);
    }

    public function test_CreateDateCheck()
    {
        $title = [
            'title' => "TEST",
            'author' => "TESTAUTHOR"
        ];
        Book::insert($title);
        $this->assertDatabaseHas('books', [
            'title' => "TEST"
        ]);
    }
}
