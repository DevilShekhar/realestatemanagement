<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class LegalPagesController extends Controller
{
    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }

    public function termsConditions()
    {
        return view('frontend.terms-conditions');
    }

    public function disclaimer()
    {
        return view('frontend.disclaimer');
    }
}