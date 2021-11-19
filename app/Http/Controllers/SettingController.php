<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

class SettingController extends Controller
{
    public function get_setting()
    {
        $setting = Setting::where('user_id',6)->first();
        return response()->json($setting);
    }
    public function edit($id)
    {
        $setting = Setting::where('user_id',$id)->first();
        return view('usuarios.editSetting',compact('setting'));
    }

    public function update(Request $request,$id)
    {
        $setting = Setting::where('user_id',$id)->first();
        $setting->fill($request->except('_token'))->save();
        if ($request->hasFile('logo')) {
            $rules = [
                'logo' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ];
            $message = [
                'image' => 'El archivo debe ser una imágen',
                'mimes' => 'La imágen debe ser jpeg,png,jpg o svg',
                'max' => 'El archivo debe como máximo :max kb'
            ];
            $validate = $request->validate($rules,$message);
            
            $nameImg= uniqid() . '.'. $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('img/empresas'), $nameImg);
            $setting->logo = $nameImg;
            $setting->save();
        }
        if (Auth::user()->admin == 0) {
            return redirect('/')->with('create.encuesta','Cambios realizados.');
        }else{
            return redirect('/dashboard')->with('msj','Cambios realizados.');
        }
    }
}
