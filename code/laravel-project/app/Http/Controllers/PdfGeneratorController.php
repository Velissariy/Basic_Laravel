<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfGeneratorController extends Controller {
    public function index(int $id) {
        $user = User::findOrFail($id);

        // Генерируем PDF из представления `userProfilePDF`
        $pdf = Pdf::loadView('userProfilePDF', compact('user'));

        // Возвращаем PDF-файл как ответ для загрузки
        return $pdf->download('profile_' . $user->id . '.pdf');
    }
}
