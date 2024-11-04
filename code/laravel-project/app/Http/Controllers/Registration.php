<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');

//        return response()->json([
//            'success' => true,
//            'data' => [
//                'name' => $name,
//                'surname' => $surname,
//                'email' => $email,
//            ],
//        ]);

        $user = [
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email')
        ];

        return view('main', compact('user'));
    }
}
