<?php

namespace App\Http\Controllers;

class PageController extends Controller {
    public function contacts() {
        return view('contacts');
    }

    public function login() {
        return view('login');
    }

    public function registration() {
        return view('registration');
    }
}
