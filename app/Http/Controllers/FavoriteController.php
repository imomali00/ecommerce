<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        return auth()->user()->favorites()->paginate(20);
    }

    public function store(Request $request): JsonResponse
    {
//         auth()->user()->favorites()->attach($request->product_id);

         if(auth()->user()->favorites()->attach($request->product_id)){
             return $this->success();
         } else {
             return $this->error();
         }

//         return response()->json([
//             'message' => 'success'
//         ]);
    }

    /*
     * TODO refactor response. make standard format
     */
    public function destroy($favorite_id)
    {
        if (auth()->user()->hasFavorites($favorite_id)) {
            auth()->user()->favorites()->detach($favorite_id);

            return $this->success();
        }

        return $this->error('favorite doesn\'t exist this user');
    }
}
