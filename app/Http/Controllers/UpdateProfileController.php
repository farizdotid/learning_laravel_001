<?php

namespace App\Http\Controllers;

use App\Models\MtSubSektor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function show_page()
    {
        $title = 'Update Profil - Ekraf Purwakarta';
        $subSectors = MtSubSektor::all();
        return view('user/update-profile', compact('subSectors', 'title'));
    }

    public function update(Request $request)
    {
        // dd($request->all()); // Add this line to inspect the incoming request data

        // Validate form input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'owner_name' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Carbon::now()->format('Ymd') . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/avatar/' . $imageName;
            $image->move(public_path('uploads/avatar'), $imageName);

            $fullImageUrl = asset($imagePath);
        }

        // Get the currently authenticated user
        $user = Auth::user();

        Log::info('User updated profile', [
            'user_id' => $user->id,
            'owner_name' => $request->input('owner_name'),
            'image_url' => $fullImageUrl ?? null,
        ]);
    

        return redirect()->intended('dashboarduser');
    }
}
