<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

//For Home Routes - Home, About, Contact, etc.
class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }
}
