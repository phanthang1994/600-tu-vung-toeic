<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChuDeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TuMoiController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth.admin'], function() {
    Route::get('/panel/category',[CategoryController::class,'index'])->name('category');
    Route::get('/panel/fetch category', [CategoryController::class, 'fetch'])->name('category.fetch');
    Route::get('/panel/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::get('/panel/category/creates',[CategoryController::class,'create'])->name('category.creates');
    Route::post('/panel/category/store',[CategoryController::class,'save'])->name('category.save');
    Route::post('/panel/category',[CategoryController::class,'store'])->name('category.store');
    Route::get('panel/category/{category_id}/edit', [CategoryController::class,'edit'])->name('category.edit');
    Route::get('panel/category/{category_id}/edits', [CategoryController::class,'edits'])->name('category.edits');
    Route::put('/panel/category/{category_id}/update',[CategoryController::class,'update'])->name('category.update');
    Route::put('/panel/category/{category_id}/updates',[CategoryController::class,'updates'])->name('category.updates');
    Route::delete('/panel/category/{category_id}/delete',[CategoryController::class,'destroy'])->name('category.delete');



    Route::get('/panel/chu_de',[ChuDeController::class,'index'])->name('chu_de');
    Route::get('/panel/fetch chu_de', [ChuDeController::class, 'fetch'])->name('chu_de.fetch');
    Route::get('/panel/chu_de/create',[ChuDeController::class,'create'])->name('chu_de.category_join');
    Route::get('/panel/chu_de/creates',[ChuDeController::class,'creates'])->name('chu_de.creates');
    Route::post('/panel/chu_de',[ChuDeController::class,'store'])->name('chu_de.store');
    Route::post('/panel/chu_de/save',[ChuDeController::class,'save'])->name('chu_de.save');
    Route::get('panel/chu_de/{chu_de_id}/edit', [ChuDeController::class,'edit'])->name('chu_de.edit');
    Route::get('panel/chu_de/{chu_de_id}/edits', [ChuDeController::class,'edits'])->name('chu_de.edits');
    Route::put('/panel/chu_de/{chu_de_id}/update',[ChuDeController::class,'update'])->name('chu_de.update');
    Route::put('/panel/chu_de/{chu_de_id}/updates',[ChuDeController::class,'updates'])->name('chu_de.updates');
    Route::delete('/panel/chu_de/{chu_de_id}/delete',[ChuDeController::class,'destroy'])->name('chu_de.delete');
    Route::get('/panel/chu_de/get_create_many_records',[ChuDeController::class,'get_excel_file'])->name('chu_de.get_excel_file');
    Route::post('/panel/chu_de/post_create_many_records',[ChuDeController::class,'upload_excel'])->name('chu_de.upload_excel');



    Route::get('/panel/tu_moi',[TuMoiController::class,'index'])->name('tu_moi');
    Route::get('/panel/fetch tu_moi', [TuMoiController::class, 'fetch'])->name('tu_moi.fetch');
    Route::get('/panel/filter tu_moi/', [TuMoiController::class, 'fetch'])->name('tu_moi.filter');
    Route::get('/panel/tu_moi/create',[TuMoiController::class,'create'])->name('tu_moi.chu_de_join');
    Route::get('/panel/tu_moi/creates',[TuMoiController::class,'creates'])->name('tu_moi.creates');
    Route::post('/panel/tu_moi',[TuMoiController::class,'store'])->name('tu_moi.store');
    Route::post('/panel/tu_moi/save',[TuMoiController::class,'save'])->name('tu_moi.save');
    Route::get('panel/tu_moi/{tu_moi_id}/edit', [TuMoiController::class,'edit'])->name('tu_moi.edit');
    Route::get('panel/tu_moi/{tu_moi_id}/edits', [TuMoiController::class,'edits'])->name('tu_moi.edits');
    Route::put('/panel/tu_moi/{tu_moi_id}/update',[TuMoiController::class,'update'])->name('tu_moi.update');
    Route::put('/panel/tu_moi/{tu_moi_id}/updates',[TuMoiController::class,'updates'])->name('tu_moi.updates');
    Route::delete('/panel/tu_moi/{tu_moi_id}/delete',[TuMoiController::class,'destroy'])->name('tu_moi.delete');
    Route::get('/panel/tu_moi/create_many',[TuMoiController::class,'create_many'])->name('tu_moi.create_many');
    Route::post('/panel/tu_moi/save_many',[TuMoiController::class,'store_many'])->name('tu_moi.store_many');
    Route::get('/panel/tu_moi/get_create_many_records',[TuMoiController::class,'get_create_many_records'])->name('tu_moi.get_create_many_records');
    Route::post('/panel/tu_moi/post_create_many_records',[TuMoiController::class,'upload_excel'])->name('tu_moi.post_create_many_records');
    Route::post('/panel/tu_moi/read_excel_tu_moi',[TuMoiController::class,'readExcelFile'])->name('tu_moi.readExcelFile');
    Route::get('/panel/tu_moi/read_excel_tu_moi',[TuMoiController::class,'displayReadExcevlFile'])->name('tu_moi.readExcelFile');
});

Route::get('/', function () {
    return view('front_end.home');
})->name('home');

Route::get('/courses', function () {
    return view('front_end.chu_de');
})->name('courses');

Route::get('/multiple_choice_question', function () {
    return view('front_end.multiple_choice_question');
})->name('multiple_choice_question');
Route::get('/"free_text_question', function () {
    return view('front_end.free_text_question');
})->name('free_text_question');
Route::get('/form_question', function () {
    return view('front_end.form_question');
})->name('form_question');

Route::get('/new_words', function () {
    return view('front_end.new_words');
})->name('new_words');

Route::get('/test_type', function () {
    return view('front_end.test_type');
})->name('test_type');

Route::get('/che_tu', function () {
    return view('front_end.che_tu');
})->name('che_tu');

//admin login
Route::get('panel/login',[LoginController::class,'getLogin'])->name('getLogin');
Route::post('panel/login',[LoginController::class,'postLogin'])->name('postLogin');
Route::get('panel/logout',[LoginController::class,'getLogout'])->name('logout');



