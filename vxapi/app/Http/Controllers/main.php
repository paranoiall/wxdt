<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class main extends Controller
{
    public function login($code) {
        return $code;
    }

    public function question() {
        return 1;
    }

    public function answer($ticket) {
        return $ticket;
    }
}
