<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.Login");
    }
    public function registration()
    {
        return view("auth.Registration");
    }
    public function inventory()
    {
        return view("products.inventory");
    }
    public function analytics()
    {
        return view("products.analytics");
    }

    public function reports()
    {
        return view("products.reports");
    }

    public function logs()
    {
        return view("products.logs");
    }
}
