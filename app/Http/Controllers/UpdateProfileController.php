<?php

namespace App\Http\Controllers;
use App\Models\MtSubSektor;

use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function show_page()
    {
        $title = 'Update Profil - Ekraf Purwakarta';
        $subSectors = MtSubSektor::all();
        return view('user/update-profile', compact('subSectors', 'title'));
    }
}
