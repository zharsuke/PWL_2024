<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about() {
        $name = "AL AZHAR RIZQI RIFA'I FIRDAUS";
        $nim = "2241720263";
        return "Name: " . $name . "<br> NIM: " . $nim;
    }
}
