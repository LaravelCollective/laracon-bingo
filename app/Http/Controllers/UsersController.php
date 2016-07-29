<?php namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;

class UsersController extends Controller
{

    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

}