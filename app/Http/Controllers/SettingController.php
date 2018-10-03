<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Setting;
use Session;
class SettingController extends Controller
{
    public function index(){
        $setting = Setting::first();
        return view('admin.settings.setting')->with('setting',$setting);
    }

    public function update(){
        $this->validate(request(),[
            'site_name' => 'required',
            'site_about' => 'required',
            'contact_number' => 'required',
            'contact_mail' => 'required | email',
            'address' => 'required',
            'facebook' => 'required | url',
            'youtube' => 'required | url',
            'twiter' => 'required | url',
        ]);
        $setting = Setting::first();
        $setting->site_name = request()->site_name;
        $setting->about = request()->site_about;
        $setting->contact_number = request()->contact_number;
        $setting->contact_mail = request()->contact_mail;
        $setting->address = request()->address;
        $setting->facebook = request()->facebook;
        $setting->youtube = request()->youtube;
        $setting->twiter = request()->twiter;
        $setting->save();
        Session::flash('success','Setting Updated Successfully.');
        return redirect()->route('setting');
    }
}