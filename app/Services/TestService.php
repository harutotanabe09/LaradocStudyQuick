<?php

namespace App\Services;

use App\Http\Controllers\Books;
use App\Mail\MailOrder;
use App\Models\Book;
use Illuminate\Support\Facades\Mail;

class TestService
{
    public function find()
    {
        Mail::to("test@com.com")->send(new MailOrder());
        return Book::all();
    }
}
