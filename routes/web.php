<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Models\Branch;
use Illuminate\Support\Facades\Route;
use App\Models\Recordmu;
use App\Models\Record;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;  

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
    return view('home2', [
        'records' => [],
        'recordsAI' => [],
        'branches' => Branch::all(),
    ]);
});


Route::get('register', [UserController::class, 'create']);
Route::post('register', [UserController::class, 'store']);

Route::get('login', [SessionController::class, 'create']);
Route::post('login', [SessionController::class, 'store']);

Route::get('/show-my-future', [UserController::class, 'showUsers']);


Route::get('/records_ai', function (Request $request) {
    $score = $request->input('score');
    $exam_type = $request->input('select-exam');
    $branch_name = $request->input('select-branch');
    if($score && $exam_type && $branch_name) {
        if($score > 100 or $score < 0) {
            return redirect('/');
        }
        return view('home', [
            'records' => Record::where('Percentile' , '<=', $score)
                                -> where('Exam(JEE/MHT-CET)', '=', $exam_type)
                                -> where('CourseName', '=', $branch_name) -> get(),
            'branches' => Branch::all(),
        ]);
    }
    else {
        return redirect('/');
    }
});

Route::get('/records_mu', function (Request $request) {
    $score = $request->input('score');
    $exam_type = $request->input('select-exam');
    $category = $request->input('select-category');
    $branch_name = $request->input('select-branch');

    if($exam_type == 'MHT-CET'){
        $records = Recordmu::select('InstituteName', 'CourseName', 'Location', $category . ' AS Category')->where('CourseName', '=', $branch_name)->where($category, '<=', $score)->latest($category)->get();
        $recordsAI = [];
    } else {
        $recordsAI = Record::select('Institute', 'CourseName', 'Exam', 'Percentile')->where('CourseName', '=', $branch_name)->where('Percentile', '<=', $score)->where('Exam', '=', $exam_type)->latest('Percentile')->get();
        $records = [];
    }
    if($score && $branch_name) {
        if($score > 100 or $score < 0) {
            return redirect('/');
        }
    }
    return view('home2', [
        'records' => $records,
        'recordsAI' => $recordsAI,
        'branches' => Branch::all(),
    ]);
});

Route::get('/excel', function() {   
    
});
