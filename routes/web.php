<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\web\ExamController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\LangController;
use App\Http\Controllers\web\SkillController;
use App\Http\Controllers\web\ContactController;
use App\Http\Controllers\web\ProfileController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\ExamController as  AdminExamController ;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\StudentController;
use App\Mail\ContactResponseMail;


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
    Route::middleware('lang')->group(function (){
    Route::get('/', [HomeController::class,'index'] );
    Route::get('/home', [HomeController::class,'index'] );
    Route::get('categories/show/{category}', [CategoryController::class,'show'] );
    Route::get('skills/show/{skill}', [SkillController::class,'show'] ); 
    Route::get('exams/show/{exam}', [ExamController::class,'show'] ); 
    Route::get('exams/questions/{question}', [ExamController::class,'questions'] )->middleware(['verified','auth','student']); 
    Route::get('/contact', [ContactController::class,'index']) ;
    Route::get('Profile', [ ProfileController::class,'index']) ;
    
  
});   

Route::post('exams/start/{id}', [ExamController::class,'start'] )->middleware(['verified','auth','student','can-enter-exam']);    
Route::post('exams/submit/{exam}', [ExamController::class,'submit'] )->middleware(['verified','auth','student']); 
Route::post('/contact/message/send', [ContactController::class,'send'] );
Route::get('lang/{lang}', [LangController::class,'lang'] ); 

Route::prefix('dashboard')->middleware(['verified','auth','can-enter-dashbord'])->group(function(){
Route::get('/',[AdminHomeController::class, 'index']);
Route::get('/categories',[AdminCategoryController::class, 'index']);
Route::post('/categories/store',[AdminCategoryController::class, 'store']);
Route::get('/categories/delete/{category}',[AdminCategoryController::class, 'delete']);    
Route::post('/categories/update',[AdminCategoryController::class, 'update']);
Route::get('/categories/toggle/{category}',[AdminCategoryController::class, 'toggle']);

Route::get('/skills',[AdminSkillController::class, 'index']);
Route::post('/skills/store',[AdminSkillController::class, 'store']);
Route::get('/skills/delete/{skill}',[AdminSkillController::class, 'delete']);    
Route::post('/skills/update',[AdminSkillController::class, 'update']);
Route::get('/skills/toggle/{skill}',[AdminSkillController::class, 'toggle']);


Route::get('/exams',[AdminExamController::class, 'index']);

Route::get('/exams/show/{exam}',[AdminExamController::class, 'show']);
Route::get('exams/questions/{exam}',[AdminExamController::class, 'showQues']);
Route::get('/exams/creat',[AdminExamController::class, 'creat']);
Route::post('/exams/store',[AdminExamController::class, 'store']);
Route::get('/exams/questions/creat/{exam}',[AdminExamController::class, 'creatQues']);
Route::post('/exams/questions/store/{exam}',[AdminExamController::class, 'storeQues']);
Route::get('/exams/edit/{exam}',[AdminExamController::class, 'editExam']);
Route::post('/exams/update/{exam}',[AdminExamController::class, 'updateExam']);

Route::get('/exams/questions/edit/{exam}/{question}',[AdminExamController::class, 'editQuestion']);
Route::post('/exams/questions/update/{exam}/{question}',[AdminExamController::class, 'updateQuestion']);
Route::get('/exams/delete/{exam}',[AdminExamController::class, 'delete']);  
Route::get('/exams/toggle/{exam}',[AdminExamController::class, 'toggle']);

Route::get('/students',[StudentController::class, 'index']);
Route::get('/students/show-scor/{id}',[StudentController::class, 'showScors']);
Route::get('/students/open-exam/{examId}/{studentId}',[StudentController::class, 'openExam']);  
Route::get('/students/closed-exam/{examId}/{studentId}',[StudentController::class, 'closedExam']);  


Route::middleware('superAdmain')->group(function(){

    Route::get('/admins',[AdminController::class, 'index']);
    Route::get('/admins/create',[AdminController::class, 'create']);
    Route::post('/admins/store',[AdminController::class, 'store']);
    Route::get('/admins/promote/{id}',[AdminController::class, 'promote']);
    Route::get('/admins/depromote/{id}',[AdminController::class, 'depromote']);


});
Route::get('/messages',[MessageController::class, 'index']);
Route::get('/messages/show/{message}',[MessageController::class, 'show']);
Route::post('/messages/respone/{message}',[MessageController::class, 'respone']);


});
