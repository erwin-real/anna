<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() { $this->middleware('auth'); }

    public function users() {
//        if ($this->isUserType('admin')) {
            return view('pages.users.index')
                ->with('users', User::orderBy('updated_at', 'desc')->paginate(10));
//        }
//        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function addUser() {
//        if ($this->isUserType('admin'))
            return view('pages.users.create');

//        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function saveUser(Request $request) {
//        if ($this->isUserType('admin')) {

            $validatedData = $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'User_Group' => 'required',
                'username' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'cover_image' => 'image|nullable|max:1999'
            ]);

            //Handle File Upload
            if ($request->hasFile('cover_image')) {
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                $fileNameToStore = $filename .'_'.time().'.'.$extension;
                $path = $request->file('cover_image')->storeAs('public/user', $fileNameToStore);
            } else $fileNameToStore = 'noimage.jpg';

            $user = new User(array(
                'username' => $validatedData['username'],
                'password' => bcrypt($validatedData['password'])
            ));

            if ($request->get('email') == null) $user->email = null;
            else {
                $validateEmail = $request->validate([ 'email' => 'max:255|unique:users' ]);
                $user->email = $validateEmail['email'];
            }

            $user->remember_token = $request->get('_token');
            $user->type = 'coordinator';
            $user->group = $request->get('User_Group');
            $user->fname = $request->get('fname');
            $user->mname = $request->get('mname');
            $user->lname = $request->get('lname');
            $user->birthday = $request->get('birthday');
            $user->address = $request->get('address');
            $user->landline = $request->get('landline');
            $user->mobile = $request->get('mobile');
            $user->image = $fileNameToStore;
            $user->save();

            return redirect('/users')
                ->with('success', 'Added new user '. $validatedData['fname'].' '.$validatedData['lname'] .' Successfully!')
                ->with('users', User::orderBy('updated_at', 'desc')->paginate(20));
//        }
//        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function showUser($id) {
//        if ($this->isUserType('admin'))
            return view('pages.users.show')->with('user', User::find($id));

//        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function editUser($id) {
//        if ($this->isUserType('admin')) {
            return view('pages.users.edit')
                ->with('user', User::find($id));
//        }
//        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function updateUser(Request $request, $id) {
//        if ($this->isUserType('admin')) {
            $user = User::find($id);

            if ($request->get('email') != $user->email && $request->get('username') != $user->username) {
                $validatedData = $request->validate([
                    'email' => 'string|email|max:255|unique:users',
                    'username' => 'required|string|max:255|unique:users',
                    'cover_image' => 'image|nullable|max:1999'
                ]);
                $user->email = $validatedData['email'];
                $user->username = $validatedData['username'];
            } else if ($request->get('email') != $user->email) {
                $validatedData = $request->validate([
                    'email' => 'string|email|max:255|unique:users',
                    'cover_image' => 'image|nullable|max:1999'
                ]);
                $user->email = $validatedData['email'];
            } else if ($request->get('username') != $user->username) {
                $validatedData = $request->validate([
                    'username' => 'required|string|max:255|unique:users',
                    'cover_image' => 'image|nullable|max:1999'
                ]);
                $user->username = $validatedData['username'];
                $user->email = $request->get('email');
            }

            //Handle File Upload
            if ($request->hasFile('cover_image')) {
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                $fileNameToStore = $filename .'_'.time().'.'.$extension;
                $path = $request->file('cover_image')->storeAs('public/user', $fileNameToStore);
                $user->image = $fileNameToStore;
            }

            $user->remember_token = $request->get('_token');
//            $user->type = 'coordinator';
            $user->group = $request->get('group');
            $user->fname = $request->get('fname');
            $user->mname = $request->get('mname');
            $user->lname = $request->get('lname');
            $user->birthday = $request->get('birthday');
            $user->address = $request->get('address');
            $user->landline = $request->get('landline');
            $user->mobile = $request->get('mobile');

            $user->save();

            return redirect('/users')
                ->with('success', 'Updated user '. $user->fname .' '. $user->lname .' Successfully!')
                ->with('users', User::orderBy('updated_at', 'desc')->paginate(20));
//        }
//        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function destroyUser($id) {
//        if ($this->isUserType('admin')) {
            $user = User::find($id);
            $user->delete();

            return redirect('/users')
                ->with('success', 'Deleted user ' . $user->name .' Successfully!')
                ->with('users', User::orderBy('updated_at', 'desc')->paginate(20));
//        }
//        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function isUserType($type) {
        return (User::find(auth()->user()->id)->type == $type) ? true : false;
    }
}
