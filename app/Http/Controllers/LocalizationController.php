<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller {

    public function setLanguage($locale) {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function getLanguage() {
        $locale = App::getLocale();
        return $locale;
    }
}
