<?php

use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Covid19Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Surachet;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\QuotationDetailController;
use App\Http\Controllers\UserController;  
use App\Http\Controllers\VehicleController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;

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
    return view('welcome');
});

Route::get("/homepage", function () {
    return "<h1>This is home page</h1>";
});

Route::get("/blog/{id}", function ($id) {
    return "<h1>This is blog page : {$id} </h1>";
});

Route::get("/blog/{id}/edit", function ($id) {
    return "<h1>This is blog page : {$id} for edit</h1>";
});

Route::get("/product/{a}/{b}/{c}", function ($a, $b, $c) {
    return "<h1>This is product page </h1><div>{$a} , {$b}, {$c}</div>";
});

Route::get("/hello", function () {
    return view("hello");
});

Route::get('/greeting', function () {

    $name = 'James';
    $last_name = 'Mars';

    return view('greeting', compact('name', 'last_name'));
});

Route::get("/gallery", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    $god = "https://www.blackoutx.com/wp-content/uploads/2021/04/Thor.jpg";
    $spider = "https://icdn5.digitaltrends.com/image/spiderman-far-from-home-poster-2-720x720.jpg";

    return view("test/index", compact("ant", "bird", "cat", "god", "spider"));
});

Route::get("/gallery/ant", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    return view("test/ant", compact("ant"));
});

Route::get("/gallery/bird", function () {
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    return view("test/bird", compact("bird"));
});

Route::get("/gallery/cat", function () {
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    return view("test/cat", compact("cat"));
});
//week3
Route::get("/teacher", function () {
    return view("teacher");
});

Route::get("/student", function () {
    return view("student");
});

Route::get("/theme", function () {
    return view("theme");
});

Route::get("/teacher/inheritance", function () {
    return view("teacher-inheritance");
});
Route::get("/student/inheritance", function () {
    return view("student-inheritance");
});

Route::get("/teacher/component", function () {
    return view("teacher-component");
});
Route::get("/student/component", function () {
    return view("student-component");
});
Route::get('/tables', function () {
    return view('tables');
});

Route::get("/myprofile/create", [MyProfileController::class, "create"]);

Route::get("/myprofile/{id}/edit", [MyProfileController::class, "edit"]);

Route::get("/myprofile/{id}", [MyProfileController::class, "show"]);

Route::get("/coronavirus", [MyProfileController::class, "coronavirus"]);

//quiz
Route::get("study-question", [ QuizController::class, "question" ])->name("study-question");
Route::post("study-match", [ QuizController::class, "match" ])->name("study-match");

// Route::get('study-question', function () {
//     $questions = json_decode(file_get_contents("https://raw.githubusercontent.com/arc6828/cs/master/json/sci-mbti.json"));
//     return view("study/question", compact('questions'));
// })->name('study-question');

// Route::post('study-match', function (Request $request) {
//     $summary = ["CS" => 0, "IT" => 0, "DISE" => 0, "HE" => 0, "NU" => 0, "FB" => 0, "SET" => 0, "OHS" => 0];
//     $majors = [
//         "CS" => "วิทยาการคอมพิวเตอร์ (CS)",
//         "IT" => "เทคโนโลยีสารสนเทศ (IT)",
//         "DISE" => "นวัตกรรมดิจิทัลและวิศวกรรมซอฟต์แวร์ (DISE)",
//         "HE" => "คหกรรมศาสตร์ (HE)",
//         "NU" => "โภชนาการและการกำหนดอาหาร (NU)",
//         "FB" => "นวัตกรรมอาหารและเครื่องดื่มเพื่อสุขภาพ (FB)",
//         "SET" => "วิทยาศาสตร์และเทคโนโลยีสิ่งแวดล้อม (SET)",
//         "OHS" => "อาชีวอนามัยและความปลอดภัย (OHS)",
//     ];
//     foreach ($_POST as $key => $value) {
//         if (!str_contains($key, "flexRadioDefault")) continue;
//         [$code, $answer] = explode("-", $value);
//         if ($answer == "yes") {            // if-yes
//             $summary[$code] = isset($summary[$code]) ? $summary[$code] + 1 : 1;
//         } else {            // if-no
//             $summary[$code] = isset($summary[$code]) ? $summary[$code] + 0 : 0;
//         }
//     }
//     $codes = array_keys($summary);
//     $values = array_values($summary);

//     return view("study/match", compact('codes', 'values', 'majors'));
// })->name('study-match');

Route::get('/covid19', [ Covid19Controller::class,"index" ]);

//Product
Route::get("/product", [ProductController::class, "index"])->name('product.index');
Route::get("/product/create", [ProductController::class, "create"])->name('product.create');
Route::post("/product", [ProductController::class, "store"])->name('product.store');
Route::get('/product/{id}', [ProductController::class, "show"])->name('product.show');
Route::get("/product/{id}/edit", [ProductController::class, "edit"])->name('product.edit');
Route::patch("/product/{id}", [ProductController::class, "update"])->name('product.update');
Route::delete("/product/{id}", [ProductController::class, "destroy"])->name('product.destroy');

// Route::resource('/product', ProductController::class );

Route::resource('/staff', StaffController::class );
//surchet
Route::get("/mainchetprofile",[Surachet::class, "mainchet"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::get('/teacher', function () {
        return view('teacher');
    });
    
    });
    


    

Route::resource('post', 'PostController');

Route::resource('post', PostController::class);

// Route::resource('profile', 'ProfileController');
// Route::resource('user', 'UserController');
// Route::resource('vehicle', 'VehicleController');

Route::resource('profile', ProfileController::class);
Route::resource('user', UserController::class);
Route::resource('vehicle', VehicleController::class);

Route::resource('product', ProductController::class);

// Route::resource('customer', 'CustomerController');
// Route::resource('quotation', 'QuotationController');
// Route::resource('quotation-detail', 'QuotationDetailController');


//Laravel 8 Case Study : Quotation & Print PDF
Route::middleware(['auth'])->group(function () {
    Route::resource('customer', CustomerController::class);
    Route::get('quotation/{id}/pdf', [QuotationController::class, 'pdf']);
    
    Route::resource('quotation', QuotationController::class);
    Route::resource('quotation-detail', QuotationDetailController::class);
});

Route::get('/test/pdf', function(){
    $a = "hello";
    $b = "world";
    $c = "ทดสอบภาษาไทย";
    $pdf = Pdf::loadView('testpdf', compact('a','b','c'));
    return $pdf->stream();
});




Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin,guest'])->group(function () {
        Route::resource('leave-request', LeaveRequestController::class)->except(['edit', 'update']);
    });
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('leave-request', LeaveRequestController::class)->only(['edit', 'update']);
        Route::resource('leave-type', LeaveTypeController::class);
        Route::get("dashboard-leave", function () {
            return view("dashboard-leave");
        });
    });
});