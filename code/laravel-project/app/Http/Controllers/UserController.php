<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function index(User $user) {
        $this->authorize('view-any', User::class);
        $users = User::all();
        return view('users', compact('users'));
    }

//    public function store(Request $request) {
//        $request->validate([
//            'name' => 'required|string|max:50|min:3',
//            'surname' => 'required|string|max:50|min:3',
//            'email' => 'required|email|max:100|unique:users,email',
//            'password' => 'required|string|min:8|confirmed',
//        ]);
//
//        // Создание нового пользователя
//        $user = User::create([
//            'first_name' => $request->input('name'),
//            'last_name' => $request->input('surname'),
//            'email' => $request->input('email'),
//            'password' => Hash::make($request->input('password')),
//        ]);
//
//        // Аутентификация пользователя
//        Auth::login($user);
//
//        return redirect()->route('home');
//    }

//    public function login(Request $request) {
//        $request->validate([
//            'email' => 'required|string|max:100|min:3',
//            'password' => 'required|min:6|max:255',
//        ]);
//
//        // Попытка аутентификации
//        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
//            return redirect()->route('home');
//        }
//
//        // Ошибка аутентификации
//        return back()->withErrors([
//            'email' => 'Неверные учетные данные.',
//        ]);
//    }
//
//    public function logout() {
//        Auth::logout();
//        return redirect()->route('home');
//    }

//    public function profile(?int $id = null) {
//        if (is_null($id)) {
//            $user = Auth::user();
//        } else {
//            $user = User::findOrFail($id);
//        }
//        return view('profile', compact('user'));
//    }

//    public function editProfile(?int $id = null) {
//        if (is_null($id)) {
//            $user = Auth::user();
//        } else {
//            $user = User::findOrFail($id);
//        }
//        return view('editProfile', compact('user'));
//    }

//    public function update(Request $request, $id) {
//        $user = User::findOrFail($id);
//
//        $request->validate([
//            'name' => 'required|string|max:50|min:3',
//            'surname' => 'required|string|max:50|min:3',
//            'email' => 'required|email|max:100|unique:users,email,' . $user->id, // уникальность, исключая текущего пользователя
//        ]);
//
//        $user->update([
//            'first_name' => $request->input('name'),
//            'last_name' => $request->input('surname'),
//            'email' => $request->input('email'),
//            'password' => $request->input('password') ? Hash::make($request->input('password')) : $user->password,
//        ]);
//
//        return redirect()->route('home');
//    }

    public function apiUsers() {
        $users = User::all();
        return response()->json($users);
    }

    public function apiUser(int $id) {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function apiStore(Request $request) {
        $request->validate([
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->input('name'),
            'last_name' => $request->input('surname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return response()->json($user, 201); // 201 - статус успешного создания
    }

    public function apiUpdate(Request $request, int $id) {
        $user = User::findOrFail($id); // Находим пользователя по ID

        $request->validate([
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'first_name' => $request->input('name'),
            'last_name' => $request->input('surname'),
            'email' => $request->input('email'),
            'password' => $request->input('password') ? Hash::make($request->input('password')) : $user->password, // Если пароль не указан, оставляем старый
        ]);

        return response()->json($user, 200); // 200 - статус успешного обновления
    }
}