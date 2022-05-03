<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\testuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class main extends Controller
{
    //
    public function index()
    {
        return view('components.home');
    }

    // აქ გადის რეგისტრაციას
    public function reg(Request $request)
    {
        // აქ არის ვალიდაცია რეგისტრაციაზე
        $request->validate([
            "name" => "required",
            "lastname" => "required",
            "email" => "required|email|unique:testusers",
            "phone" => "required|min:5|max:12",
        ]);


        $users = new testuser;
        $users->name = $request->name;
        $users->lastname = $request->lastname;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $save = $users->save();
        if ($save) {
            // return back()->with('success', 'user added successfully');
            return back()->with('success', 'user added successfully');
        } else {
            return back()->with('fail', 'something went wrong');
        }
        // return $request->post();
    }

    // ამას გამოაქ თებილზე ბაზიდან მონაცემები
    public function costum()
    {
        $data = DB::select('select * from testusers');
        return view('components.redirect', compact('data'));
    }

    // ადმინის ლოგინი
    public function admin()
    {
        return view('components.login');
    }
    public function checkadmin(Request $request)
    {
        $request->validate([
            "mail" => "required|email",
            "password" => "required|min:5|max:12",
        ]);
        $mail = DB::select('select mail from admin where mail = ?', [$request->post('mail')]);
        $pass = json_decode(json_encode(DB::select('select password from admin')), true);

        // პაროლის შემოწმება
        $password = Hash::check($request->post('password'), $pass[0]['password']);

        if ($mail && $password) {
            echo 'sworia';
            $request->session()->put('loggedUser', 'true');
            return redirect(route('costum'))->with('successs', 'user added successfully');
        } else {
            echo 'araa swori';
            return redirect(route('admin'))->with('failed', 'მომხმარებლის სახელი ან პაროლი არასწორია!');
        }

        // return $request->all();
    }
}
