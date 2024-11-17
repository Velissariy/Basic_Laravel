<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogRequestController extends Controller {
    public function index() {
        $logs = Log::with('user') // Загружаем пользователя
        ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('logRequest', compact('logs'));
    }
}
