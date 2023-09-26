<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            "email"=>"required|min:12",
            "password"=>"required|min:6",
        ]);


        $data = $request->only("email","password");

        if(Auth::attempt($data)){

            return redirect()->route("home");

        }else{
            return back()->withErrors(['error' => 'Məlumatlar yanlışdır.!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("register.index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|min:3|max:15",
            "surname"=>"required|min:3|max:15",
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            "password"=>"required|min:6|confirmed|regex:/^\S*$/",
            'password_confirmation' => 'required|min:6'
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        // hash()
        $user->password= bcrypt($request->password);
        $user->save();

        return redirect()->route("login")->with("success","Qeydiyyat uğurla tamalandı");

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $posts = Post::all();
        

        // dd($posts);
        

        return view("home.index",compact("posts"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route("login");

    }

    /**
     * Update the specified resource in storage.
     */
    public function profile()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId); // Kullanıcı modelini ID ile bulma
        };
        return view("profile.index",compact("user"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            "name"=>"required|min:3|max:12",
            "surname"=>"required|min:3|max:12",
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        ]);
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId); // Kullanıcı modelini ID ile bulma

            $user->name=$request->name;
            $user->surname=$request->surname;
            $user->email=$request->email;
            $user->save();
        };
        return redirect()->back()->with('success', 'Profilə dəyişiklik olundu.');

    }
    
    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId);
             // Kullanıcı modelini ID ile bulma

             if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('uploads/profile', $imageName, 'public'); // Resmi "public/images" klasörüne kaydet
    
    
                $user->profile_image = $imageName;

                $user->save();
    
                return redirect()->back()->with('success', 'Profil şəkili əlavə olundu.');
            }
        };

        // dd($user);



    }
}
