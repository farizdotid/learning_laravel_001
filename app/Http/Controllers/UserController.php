<?php

namespace App\Http\Controllers;

use App\Models\MtSubSektor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function register()
    {
        $title = 'Register';
        $subSectors = MtSubSektor::all();
        return view('user/register', compact('subSectors', 'title'));
    }

    public function register_action(Request $request)
    {
        $selectedSubSectorId = $request->input('selectedSubSectorId');
        $selectedBusinessCategory = $request->input('selectedBusinessCategory');
    
        $request->validate([
            'business_name' => 'required|unique:tb_user',
            'email' => 'required|unique:tb_user',
            'phone_number' => 'required|unique:tb_user',
            'password' => 'required',
            'selectedSubSectorId' => 'required|integer',
            'selectedBusinessCategory' => 'required',
            'password_confirm' => 'required|same:password'
        ]);

        $user = new User([
            'business_name' => $request->business_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'id_sub_sektor' => $selectedSubSectorId,
            'business_category' => $selectedBusinessCategory,
            'logo_business' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/2048px-No_image_available.svg.png',
            'description' => '',
            'owner_name' => '',
            'nik' => '',
            'address' => '',
            'kecamatan' => '',
            'website' => '',
            'social_media' => '',
            'business_legal' => '',
            'nib' => '',
            'siup' => '',
            'haki' => '',
            'income' => '',
            'complaints' => '',
            'solutions' => '',
        ]);

        $user->save();

        return redirect()->route('login')->with('success', 'Pendaftaran Berhasil');
    }


    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');

        }

        return back()->withErrors([
            'password' => 'Email / Password salah',
        ]);
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password berhasil diubah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
