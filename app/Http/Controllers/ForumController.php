<?php

namespace App\Http\Controllers;

use App\Exports\FeedbackExport;
use App\Models\FormDiskusi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ForumController extends Controller
{
    // public function index()
    // {
    //     // $feedback = FormDiskusi::all();
    //     return view('feedback.index', compact('feedback'));
    // }

    // public function export(Request $request)
    // {
    //     // Validasi input bulan dan tahun
    //     $request->validate(['month_year' => 'required|date_format:Y-m']);

    //     // Memisahkan bulan dan tahun dari input
    //     [$year, $month] = explode('-', $request->month_year);

    //     // Eksekusi ekspor
    //     return Excel::download(new FeedbackExport($month, $year), 'feedback.xlsx');
    // }
}
