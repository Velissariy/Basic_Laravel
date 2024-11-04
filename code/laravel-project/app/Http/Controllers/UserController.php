<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function index(User $user) {

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

        // Аутентификация пользователя
        Auth::login($user);

        // Редирект на главную страницу
        return redirect()->route('home');
    }

    public function showList() {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|min:6',
        ]);

        // Попытка аутентификации
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        // Ошибка аутентификации
        return back()->withErrors([
            'email' => 'Неверные учетные данные.',
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
