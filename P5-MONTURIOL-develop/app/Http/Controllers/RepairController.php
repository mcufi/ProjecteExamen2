<?php
namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function show()
    {
        return Inertia::render('Skin/repair');
    }
}