<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        // Mengambil semua data dari model "Contact"
        $contacts = Contact::all();
        return view('contact', compact('contacts'));
    }
}

