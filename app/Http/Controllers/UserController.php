<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\StoreUserRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()){
        $users = User::paginate(10);
        return view('user.index', ['users' => $users]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (auth()->check())
        {
        return view('user.show',['user'=>$user]);}

    }

}
