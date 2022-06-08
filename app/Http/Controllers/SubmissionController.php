<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index() {
        $submissions = Submission::all();
        return view('index', compact('submissions'));
    }

    public function create() {
        $cities = [
            'Surabaya', 
            'Banyuwangi', 
            'Jember', 
            'Bojonegoro', 
            'Lamongan', 
            'Gresik', 
            'Madiun', 
            'Sampang',
            'Pamekasan',
        ];
        sort($cities);
        return view('create', compact('cities'));
    }

    public function store(Request $request) {
        
    }
}
