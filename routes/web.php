<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChuDeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TuMoiController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth.admin'], function() {
    Route::get('/panel/category',[CategoryController::class,'index'])->name('category');
    Route::get('/panel/category/creates',[CategoryController::class,'create'])->name('category.creates');
    Route::post('/panel/category/store',[CategoryController::class,'save'])->name('category.save');
    Route::get('panel/category/{category_id}/edits', [CategoryController::class,'edits'])->name('category.edits');
    Route::put('/panel/category/{category_id}/updates',[CategoryController::class,'updates'])->name('category.updates');
    Route::delete('/panel/category/{category_id}/delete',[CategoryController::class,'destroy'])->name('category.delete');



    Route::get('/panel/chu_de',[ChuDeController::class,'index'])->name('chu_de');
    Route::get('/panel/chu_de/creates',[ChuDeController::class,'creates'])->name('chu_de.creates');
    Route::post('/panel/chu_de/save',[ChuDeController::class,'save'])->name('chu_de.save');
    Route::get('panel/chu_de/{chu_de_id}/edits', [ChuDeController::class,'edits'])->name('chu_de.edits');
    Route::put('/panel/chu_de/{chu_de_id}/updates',[ChuDeController::class,'updates'])->name('chu_de.updates');
    Route::delete('/panel/chu_de/{chu_de_id}/delete',[ChuDeController::class,'destroy'])->name('chu_de.delete');
    Route::get('/panel/chu_de/get_create_many_records',[ChuDeController::class,'get_excel_file'])->name('chu_de.get_excel_file');
    Route::post('/panel/chu_de/post_create_many_records',[ChuDeController::class,'upload_excel'])->name('chu_de.upload_excel');
    Route::get('/panel/chu_de/get_many_images',[ChuDeController::class,'get_many_images'])->name('chu_de.get_many_images');
    Route::post('/panel/chu_de/upload_many_images',[ChuDeController::class,'upload_many_images'])->name('chu_de.upload_many_images');


    Route::get('/panel/tu_moi',[TuMoiController::class,'index'])->name('tu_moi');
    Route::get('/panel/tu_moi/creates',[TuMoiController::class,'creates'])->name('tu_moi.creates');
    Route::post('/panel/tu_moi/save',[TuMoiController::class,'save'])->name('tu_moi.save');
    Route::get('panel/tu_moi/{tu_moi_id}/edits', [TuMoiController::class,'edits'])->name('tu_moi.edits');
    Route::put('/panel/tu_moi/{tu_moi_id}/updates',[TuMoiController::class,'updates'])->name('tu_moi.updates');
    Route::delete('/panel/tu_moi/{tu_moi_id}/delete',[TuMoiController::class,'destroy'])->name('tu_moi.delete');
    Route::get('/panel/tu_moi/get_create_many_records',[TuMoiController::class,'get_create_many_records'])->name('tu_moi.get_create_many_records');
    Route::post('/panel/tu_moi/post_create_many_records',[TuMoiController::class,'upload_excel'])->name('tu_moi.post_create_many_records');
    Route::get('/panel/tu_moi/get_many_images',[TuMoiController::class,'get_many_images'])->name('tu_moi.get_many_images');
    Route::post('/panel/tu_moi/upload_many_images',[TuMoiController::class,'upload_many_images'])->name('tu_moi.upload_many_images');

});

Route::get('/', [CategoryController::class,'home']
)->name('home');

Route::get('/courses',
 [ChuDeController::class,'all_courses']
)->name('courses');
Route::get('/course_detail/{category_id}',
    [CategoryController::class,'subject_detail']
)->name('course_detail');

Route::get('/test_type', [TuMoiController::class,'test_type'])->name('test_type');

Route::get('/multiple_choice_question', function () {
    return view('front_end.multiple_choice_question');
})->name('multiple_choice_question');
Route::get('/"free_text_question', function () {
    return view('front_end.free_text_question');
})->name('free_text_question');
Route::get('/form_question', function () {
    return view('front_end.form_question');
})->name('form_question');

Route::any('/new_word/{chu_de_id}',[TuMoiController::class,'get_view'])->name('new_words');
Route::get('/new_words/{chu_de_id}',[TuMoiController::class,'get_json'])->name('new_words_list');



Route::get('/che_tu', function () {
    return view('front_end.che_tu');
})->name('che_tu');

//admin login
Route::get('panel/login',[LoginController::class,'getLogin'])->name('getLogin');
Route::post('panel/login',[LoginController::class,'postLogin'])->name('postLogin');
Route::get('panel/logout',[LoginController::class,'getLogout'])->name('logout');



