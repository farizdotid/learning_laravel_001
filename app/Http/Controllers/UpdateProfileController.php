<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function show_page()
    {
        $title = 'Update Profil - Ekraf Purwakarta';
        return view('user/update-profile', compact('title'));
    }
}
