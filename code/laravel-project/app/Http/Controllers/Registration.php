<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Registration extends Controller {
    public function index() {
        return view('main')->with('content', view('registrationForm'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Создание нового пользователя
        $user = User::create([
            'first_name' => $request->input('name'),
            'last_name' => $request->input('surname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Редирект на главную страницу
        return redirect()->route('home');
    }
}