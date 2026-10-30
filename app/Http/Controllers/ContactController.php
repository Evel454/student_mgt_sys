<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ContactController extends Controller
{
    public function contact(): View
    {
        return view('contact');
    }

    public function contactlist(): View
    {
        return view('contactlist');
    }
}
