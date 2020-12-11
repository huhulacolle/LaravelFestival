<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\Etablissement;

class test extends Controller
{
    $test = Etablissement::where('nombreChambresOffertes', '>=', 1);
}
