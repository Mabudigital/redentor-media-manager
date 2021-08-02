<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audio;
use App\Models\Video;
use App\Models\Image;

class DashboardController extends Controller
{

    public function index()
    {
        $videos = Video::get();
        $audios = Audio::all();
        $images = Image::all();

        //dd($videos);

        return view('admin.dashboard',['videos'=> $videos, 'audios' => $audios, 'images' => $images]);
    }



}
