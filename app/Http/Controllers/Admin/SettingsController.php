<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit()
    {
        $title = 'admin.settings_edit';
        $setting = Setting::first();
        return view('admin.settings.edit', compact('title', 'setting'));

    }//end function

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        Setting::orderBy('id', 'desc')->update($data);
        return redirect(aurl('settings'));


    }//end function

}
