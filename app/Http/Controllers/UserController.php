<?php

namespace App\Http\Controllers;

use Validator;
#use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;
use Image;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('user.profile', ['user'=>auth()->user()]);
    }

    public function AvatarDelete()
    {
    	$user = auth()->user();
    	Storage::disk('public')->delete('avatars/'.$user->avatar);
    	$user->avatar = null;
    	$user->save();
        return redirect()->back();

    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|between:2,32',
            'surname' => 'required|between:2,32',
            'avatar' => 'mimes:jpeg,png|dimensions:min_width=100,min_height=200',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        $user = auth()->user();
        $user->name = $request->name;
        $user->surname = $request->surname;

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
       		$avatar = $request->file('avatar');

       		if($user->avatar) {
				if(Storage::disk('public')->exists('avatars/'.$user->avatar)) {
				    Storage::disk('public')->delete('avatars/'.$user->avatar);
				    $user->avatar = null;
				}
       		}

       		$filename = md5(time()) . '.' . $avatar->getClientOriginalExtension();
       		//Оптимизируем изображение
       		$image = Image::make($avatar)->resize(300, 300)->encode($avatar->getClientOriginalExtension());
       		//Пишем в хранилище
       		$storage = Storage::disk('public')->put('avatars/'.$filename, $image->getEncoded(), 'public');
       		if($storage == true) {
       			$user->avatar = $filename;
       		}
   		}


        $user->save();

        return redirect()->back();
        #return redirect('/');
    }

}
