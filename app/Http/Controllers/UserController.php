<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function uploadAvatar(Request $request)
    {

        if ($request->hasfile('image')) {

            User::uploadAvatar($request->image);



            return redirect()->back()->with('message', 'Image has been Uploaded.'); // success message
        }



        return redirect()->back()->with('error', 'Image has not been Uploaded.'); // error message
    }



    public function index()
    {
        //insert query
        // DB::insert('INSERT INTO users (name, email, password)
        //             VALUES(?,?,?)', [
        //     'shuvo', 'shuvo@gmail.com', '12345shu'
        // ]);

        //select query
        // $users = DB::select('select * from users');
        // return $users;

        //update query
        // $users = DB::update('update users set name= ? where id = 5', ['Moin uddin']);
        // $users = DB::select('select * from users');
        // return $users;

        //delete query
        // $users =  DB::delete('delete from users where id = 1');
        // return $users;

        //insert query
        // DB::table('users')->insert([
        //     ['name' => 'shuvo', 'email' => 'shuvo@gmail.com', 'password' => 'shuvo123'],
        //     ['name' => 'lise', 'email' => 'lise@gmail.com', 'password' => 'lise123'],
        // ]);


        // $user = new User();
        // $user->name = 'niloy';
        // $user->email = 'niloy@gmail.com';
        // $user->password = bcrypt('niloy');
        // $user->save();

        // $user = User::all();
        // return $user;


        return view('welcome');
    }
}
