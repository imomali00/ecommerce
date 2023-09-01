<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPaymentCardsRequest;
use App\Http\Resources\UserPaymentCardResource;
use App\Models\UserPaymentCards;
use Illuminate\Http\JsonResponse;

class UserPaymentCardsController extends Controller
{
    public function index()
    {
        return $this->response(UserPaymentCardResource::collection(auth()->user()->paymentCards));
    }

    public function store(StoreUserPaymentCardsRequest $request): JsonResponse
    {
        $card = auth()->user()->paymentCards()->create([
            'name' => encrypt($request->name),
            'number' => encrypt($request->number),
            'exp_date' => encrypt($request->exp_date),
            'holder_name' => encrypt($request->holder_name),
            'last_four_numbers' => encrypt(substr($request->number, -4)),
            'payment_card_type_id' => $request->payment_card_type_id,
        ]);

        return $this->success('Card added', $card);
    }

    public function show(UserPaymentCards $userPaymentCards)
    {
        //
    }

    public function destroy(UserPaymentCards $userPaymentCards)
    {
        //
    }
}
