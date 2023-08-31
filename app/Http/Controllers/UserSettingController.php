<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserSettingRequest;
use App\Http\Requests\UpdateUserSettingRequest;
use App\Models\UserSetting;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserSettingRequest $request)
    {
        $userSetting = auth()->user()->settings()->create([
            'setting_id' => $request->setting_id,
            'value_id' => $request->value_id ?? null,
            'switch' => $request->switch
        ]);

        return $this->success('User setting created successfully', $userSetting);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserSetting $userSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserSetting $userSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserSettingRequest $request, UserSetting $userSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserSetting $userSetting)
    {
        //
    }
}
