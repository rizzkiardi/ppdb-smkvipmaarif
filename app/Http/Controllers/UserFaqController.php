<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class UserFaqController extends Controller
{
    // Menampilkan daftar FAQ kepada user
    public function welcome()
    {
        $faqs = Faq::all();
        return view('welcome', compact('faqs'));
    }
}
