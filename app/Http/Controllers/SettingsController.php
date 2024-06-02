<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Services\ImageService;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        if ($settings) {
            $settings['header_logo'] = asset($settings['header_logo']);
            $settings['footer_logo'] = asset($settings['footer_logo']);
            //  dd($settings);

            return view('setting/index', compact('settings'));
        } else {
            abort(404, 'Settings not found');
        }
    }

    public function update(Request $request)
    {
        $settings = Setting::first();
        if ($settings) {

            $validatedData = $request->validate([
                'phone' => 'sometimes|string|required',

                'email' => 'sometimes|string|required|email ',

            ]);
            
            // dd($validatedData);
            $existingContacts = array_merge($settings, $validatedData);
            if ($request->hasFile('header_logo')) {
                ImageService::delete($existingContacts['header_logo']);
                $existingContacts['header_logo'] = ImageService::upload($request->file('header_logo'), 'settings');
            }
            if ($request->hasFile('footer_logo')) {
                ImageService::delete($existingContacts['footer_logo']);
                $existingContacts['footer_logo'] = ImageService::upload($request->file('footer_logo'), 'settings');
            }

            $settings->company_info = json_encode($existingContacts);
            $settings->save();
            // dd($settings);
        } else {
            abort(404, 'Settings not found');
        }
    }

    public static function GetData()
    {
        $settings = Setting::first();
        if ($settings) {
            $settings = json_decode($settings->company_info, true);
            $settings['header_logo'] = asset($settings['header_logo']);
            $settings['footer_logo'] = asset($settings['footer_logo']);

            return $settings;
        }
    }
}
