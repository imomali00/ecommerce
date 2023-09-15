<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;

class PaymentTypeController extends Controller
{
    public function index()
    {
        return $this->response(PaymentType::all());
    }
}
