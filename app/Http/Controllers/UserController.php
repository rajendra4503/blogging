<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;
class UserController extends Controller
{

    public function index(){
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'    => 'required',
            'email'   => 'required |email',
            'avatar'  => 'required|image',
            'facebook'=> 'required | url',
            'youtube' => 'required | ulr'
        ]);
        if($request->file('avatar')){ 
            $featured = $request->file('avatar');
            $fileName = time().$featured->getClientOriginalName();
            $featured->move('upload/avatars',$fileName);
        }
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt('password')
        ]);
        Profile ::create([
            'user_id'  => $user->id,
            'avatar'   => 'upload/avatars/'.$fileName,
            'facebook' => $request->facebook,
            'youtube'  => $request->youtube,
            'about'   => $request->about,
        ]);
        Session::flash('success','New User Create Successfully.');
        return redirect()->route('users');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        $user->profile->delete();
        Session::flash('success','User Deleted Successfully.');
        return redirect()->route('users');
    }

    public function make_admin($id){
        $user = User::findOrFail($id);
        $user->admin = 1;
        $user->save();
        Session::flash('success','User Updated Successfully.');
        return redirect()->back();
    }

    public function not_admin($id){
        $user = User::findOrFail($id);
        $user->admin = 0;
        $user->save();
        Session::flash('success','User Updated Successfully.');
        return redirect()->back();
    }
}
