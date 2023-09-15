<?php

namespace App\Http\Controllers;

class ReviewController extends Controller
{

    public function index()
    {
        return auth()->user()->reviews()->with('product')->paginate(10);
    }
}
