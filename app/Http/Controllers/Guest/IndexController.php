<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('guest.homepage.index');
    }

    public function aboutUs() {
        return view('guest.about-us');
    }

    public function termsAndConditions() {
        return view('guest.terms-and-conditions');
    }

    public function privacyPolicy() {
        return view('guest.privacy-policy');
    }

    public function contactUs() {
        return view('guest.contact-us');
    }

    public function repairServices() {
        return view('guest.repair-services');
    }

    public function sellYourElectronics() {
        return view('guest.sell-electronics');
    }

    public function marketplace() {
        return view('guest.marketplace');
    }
}
