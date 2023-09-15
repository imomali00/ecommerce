<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingResource;
use App\Models\Setting;

class SettingController extends Controller
{

    public function index()
    {
        return $this->response(SettingResource::collection(Setting::all()));
    }
}
