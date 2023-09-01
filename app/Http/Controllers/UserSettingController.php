<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserSettingRequest;
use App\Http\Requests\UpdateUserSettingRequest;
use App\Http\Resources\UserSettingResource;
use App\Models\UserSetting;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->response(UserSettingResource::collection(auth()->user()->settings));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserSettingRequest $request)
    {
        if (auth()->user()->settings()->where('setting_id', $request->setting_id)->exists()) {
            return $this->error('Setting already exist!!!');
        }
        $userSetting = auth()->user()->settings()->create([
            'setting_id' => $request->setting_id,
            'value_id' => $request->value_id ?? null,
            'switch' => $request->switch
        ]);

        return $this->success('User setting created successfully', $userSetting);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserSettingRequest $request, UserSetting $userSetting)
    {
        $userSetting->update([
            'switch' => $request->switch,
            'value_id' => $request->value_id,
        ]);

        return $this->success('User Setting successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserSetting $userSetting)
    {
        $userSetting->delete();
        return $this->success('User setting deleted!');
    }
}
