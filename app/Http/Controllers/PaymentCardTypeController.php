<?php

namespace App\Http\Controllers;

use App\Models\PaymentCardType;

class PaymentCardTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->response(PaymentCardType::all());
    }
}
