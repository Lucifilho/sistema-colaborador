<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\Models\User;
use App\Models\Pessoa;
use Auth;


class AdminDashboardController extends Controller
{
    public function adminPage()
    {

        if (Auth::check()) {
            $userLogged = Auth::user()->name;
        } else {
            $userLogged = "Guest"; 
        }

        $path = Request::path();


        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        // Get the total number of registered users
        $totalUsers = User::count();

        // Get the latest 5 registered users
        $latestUsers = User::latest()->take(5)->get();

        $lastDateRecord = Pessoa::latest('updated_at')->first();

        if ($lastDateRecord) {

            $lastDate = $lastDateRecord->updated_at->format('d/m/Y');

        } else {
            
        }


    return view('pages.admin', [
        'totalUsers' => $totalUsers,
        'latestUsers' => $latestUsers,
        'path'=> $path,
        'userLogged' => $userLogged,
        'lastDate' => $lastDate
    ]);

    }
}
