<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAddressRequest;
use Illuminate\Http\JsonResponse;

class UserAddressController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->response(auth()->user()->addresses);
    }


    public function store(StoreUserAddressRequest $request): JsonResponse
    {
        $address = auth()->user()->addresses()->create($request->toArray());

        return $this->success('shipping address created', $address);
    }
}
