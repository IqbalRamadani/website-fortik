<?php

namespace App\Http\Controllers;

use App\Services\PhotoService;

class HomeController extends Controller
{
    public function index(PhotoService $photoService)
    {
        $sliderPhotos = $photoService->getSliderPhotos();
        return view('beranda', compact('sliderPhotos'));
    }
}
