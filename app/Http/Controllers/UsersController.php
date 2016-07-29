<?php namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{

    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        $user->load('terms.term');

        return $user;
    }

}