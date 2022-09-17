<?php

use App\Models\Branch;
use Illuminate\Support\Facades\Route;
use App\Models\Record;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'records' => [],
        'branches' => Branch::all(),
    ]);
});

Route::get('/records', function (Request $request) {
    $jee_score = $request->input('jee-score');
    $exam_type = $request->input('select-exam');
    $branch_name = $request->input('select-branch');
    if($jee_score && $exam_type && $branch_name) {
        if($jee_score > 100 or $jee_score < 0) {
            return redirect('/');
        }
        return view('home', [
            'records' => Record::where('Percentile' , '<=', $jee_score)
                                -> where('Exam(JEE/MHT-CET)', '=', $exam_type)
                                -> where('CourseName', '=', $branch_name) -> get(),
            'branches' => Branch::all(),
        ]);
    }
    else {
        return redirect('/');
    }
});
