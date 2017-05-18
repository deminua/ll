<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        #$this->middleware('auth');
    }


  public function s3()
    {   

        #$incoming_file = '/Users/John/Desktop/file_loco.jpg';

        #$get = Storage::get('AM113_001_platanus_specular.jpg');
        #return dd($get);

        #$exists = Storage::disk('s3')->exists('avatars/ArcheAge_sample.jpg');
        #$files = Storage::disk('s3')->allFiles();
        #return dd($files);
        #$getVisibility = Storage::disk('s3')->getVisibility('avatars/ArcheAge_sample.jpg');
        #return dd($getVisibility);
        #$get = Storage::disk('s3')->get('avatars/ArcheAge_sample.jpg');
        #return dd($get);
        $url = Storage::disk('s3')->url('avatars/AM113_001_platanus_specular.jpg');
        return dd($url);
        
        return response()->file($url);
        $data = Storage::get('AM113_001_platanus_specular.jpg');
                Storage::disk('s3')->put('avatars/AM113_001_platanus_specular.jpg', $data);
        $files = Storage::disk('s3')->allFiles();
        return dd($files);
        return view('home');
    }

    public function index()
    {
        return view('home');
    }
}
