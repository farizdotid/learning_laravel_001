<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $user = Auth::user();
        $userProducts = $user->products;

        return view('dashboarduser', compact('userProducts', 'title'));
    }
}
