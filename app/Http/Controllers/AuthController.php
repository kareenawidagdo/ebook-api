<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function me() {
        return [
            'NIS' => '3103119098',
            'Name' => 'Kareena Widagdo',
            'Gender' => 'Female',
            'Phone' => '082242024001',
            'Class' => 'XII RPL 3'
        ];
    }
}
