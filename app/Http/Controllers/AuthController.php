<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me() {
        return [
            "nis" => "3103120136",
            "phone" => "081234567890",
            "nama" => "Muamar Zidan tri Antoro",
            "kelas" => "XII RPL 4",

        ];
    }
}
