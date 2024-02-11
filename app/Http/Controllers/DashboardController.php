<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->roles->contains('role_name', 'administrator')) {
            return response('you are allowed to login to admin dashboard')->json([ 'role' => 'administrator']);
        } elseif ($user->roles->contains('role_name', 'proprietor')) {
            return response('you are allowed to login to proprietors dashboard')->json([ 'role' => 'proprietor']);
        } elseif ($user->roles->contains('role_name', 'customer')) {
            return response('login successfully')->json([ 'role' => 'customer']);
        } else {
            // Handle cases where the user doesn't have a recognized role
            return response('Bad Request')->json(['error' => 'Unauthorized'], 403);
        }
    }
}
