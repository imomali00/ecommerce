<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;
use Illuminate\Database\Eloquent\Collection;

class DeliveryMethodController extends Controller
{
    public function index(): Collection
    {
        return DeliveryMethod::all();
    }
}
