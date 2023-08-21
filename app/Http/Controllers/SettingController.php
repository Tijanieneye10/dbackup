<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(SettingsRequest $request)
    {
        Setting::updateOrCreate([
            'id' => 1
        ],[
            'period' => $request->period,
            'time' => $request->time,
            'cleanup_period' => $request->cleanupPeriod,
            'cleanup_time' => $request->cleanupTime,
            'status' => $request->status === 'on' ? true : false,
        ]);

        return back();
    }
}
