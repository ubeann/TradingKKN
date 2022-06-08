<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index(Request $request) {
        // Get all submissions
        $submissions = Submission::all()->where('status', 'open')->sortBy('created_at');
    
        // Filter by gender
        if ($request->has('gender') && $request->input('gender') != null && $request->input('gender') != '') {
            $gender = $request->input('gender');
            $submissions = $submissions->filter(function ($submission) use ($gender) {
                return $submission->gender == $gender;
            });
        }

        // Filter by destination
        if ($request->has('destination_cities') && $request->input('destination_cities') != null && $request->input('destination_cities') != '') {
            $destination_cities = explode(',', $request->input('destination_cities'));
            $submissions = $submissions->filter(function ($submission) use ($destination_cities) {
                return in_array($submission->origin_city, $destination_cities);
            });
        }

        // Filter by origin city
        if ($request->has('origin_city') && $request->input('origin_city') != null && $request->input('origin_city') != '') {
            $origin_city = $request->input('origin_city');
            $submissions = $submissions->filter(function ($submission) use ($origin_city) {
                return in_array($origin_city, $submission->destination);
            });
        }

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
        // Validate request
        $request->validate([
            'name' => 'string|max:255|min:3|nullable',
            'gender' => 'required',
            'origin_village' => 'required',
            'origin_district' => 'required',
            'origin_city' => 'required',
            'destination_city' => 'required|array',
            'reason' => 'string|max:255|min:3|nullable',
        ]);

        // Check phone number
        if ($request->has('phone') && $request->input('phone') != null) {
            $phone = str_replace(" ","",$request->input('phone'));
            $phone = str_replace("(","",$phone);
            $phone = str_replace(")","",$phone);
            $phone = str_replace(".","",$phone);
            $phone = str_replace("-","",$phone);
            if(!preg_match('/[^+0-9]/',trim($phone))){
                if(substr(trim($phone), 0, 3) == '+62'){
                    $phone = trim($phone);
                }
                elseif(substr(trim($phone), 0, 1) == '0'){
                    $phone = '+62'.substr(trim($phone), 1);
                }

                // Merge request input
                $request->merge([
                    'phone' => $phone,
                ]);
            } else {
                return redirect()->back()->with('error', 'Nomor telepon tidak valid, silahkan isi kembali!')->withInput($request->all());
            }
        }

        // Check if phone, line, tele fields are filled
        if ($request->input('phone') == null && $request->input('username_line') == null && $request->input('username_telegram') == null) {
            return redirect()->back()->with('error', 'Silahkan mengisi salah satu dari nomor telepon, username line, atau username telegram!')->withInput($request->all());
        }

        // Create submission
        Submission::create([
            'name' => $request->input('name') ?? 'Anonim',
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'username_line' => $request->input('username_line'),
            'username_telegram' => $request->input('username_telegram'),
            'origin_village' => $request->input('origin_village'),
            'origin_district' => $request->input('origin_district'),
            'origin_city' => $request->input('origin_city'),
            'destination' => $request->input('destination_city'),
            'reason' => $request->input('reason') ?? 'Tidak bisa disebutkan.',
        ]);

        return redirect()->route('landing')->with('success', 'Permintaan anda berhasil dibuat, silahkan menunggu dihubungi oleh peserta KKN lain yang akan bertukar anda. Semoga beruntung!');
    }

    public function take(Request $request) {
        // Check cookie 
        if ($request->hasCookie('submission_id')) {
            return redirect()->route('taken.show')->with('error', 'Anda sudah mengambil permintaan penukaran KKN, silahkan batalkan terlebih dahulu!');
        }

        // Validate request
        $request->validate([
            'id' => 'required|exists:submissions,id',
        ]);

        // Update submission status to taken
        Submission::find($request->input('id'))->update([
            'status' => 'taken',
        ]);

        // Create Cookie using Submission ID
        $cookie = cookie('submission_id', $request->input('id'), 60 * 24);
        return redirect()->route('taken.show')->withCookie($cookie);
    }

    public function show(Request $request) {
        // Check cookie
        if (!$request->hasCookie('submission_id')) {
            return redirect()->route('landing')->with('error', 'Anda belum mengambil permintaan penukaran KKN, silahkan ambil terlebih dahulu!');
        } else {
            $submission = Submission::find($request->cookie('submission_id'));
            return view('show', compact('submission'));
        }
    }

    public function cancel(Request $request) {
        // Check cookie
        if (!$request->hasCookie('submission_id')) {
            return redirect()->route('landing')->with('error', 'Anda belum mengambil permintaan penukaran KKN, silahkan ambil terlebih dahulu!');
        } else {
            // Update submission status to open
            $submission = Submission::find($request->cookie('submission_id'));
            $submission->update([
                'status' => 'open',
            ]);

            // Delete cookie
            $cookie = cookie('submission_id', null, -1);

            return redirect()->route('landing')->withCookie($cookie)->with('success', 'Permintaan anda berhasil dibatalkan, silahkan mengambil kembali permintaan penukaran KKN yang lain.');
        }
    }
}