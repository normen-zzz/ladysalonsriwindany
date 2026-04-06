<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch(Request $request, string $locale)
    {
        if (!in_array($locale, ['id', 'en'])) {
            $locale = 'id';
        }
        session(['locale' => $locale]);
        return redirect()->back()->withInput();
    }
}
