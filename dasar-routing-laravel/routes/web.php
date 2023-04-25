<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//
/*
Berikut adalah method-method yang ada pada Route Laravel. Semua 6 method ini digunakan untuk merespon HTTP request.
*/
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);

/*
Route redirect digunakan untuk shortcut atau jalan pintas yang mudah sehingga tidak perlu menentukan route secara lengkap.

Route redirect juga dapat mengatur dan memberikan response code.
*/
Route::redirect('/here', '/there');

Route::redirect('here', '/there', 301);

Route::permanentRedirect('/here', '/there');

/*
Route view digunakan untuk menampilkan sebuah halaman blade php. Lalu route view juga dapat memasukkan variable dengan valuenya.
*/

Route::view('/welcome', 'welcome');

Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

/*
    Pada route method get dibawah memiliki parameter ID, jika kita memasukkan id maka variabel id akan terisi nilai.
*/

Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('posts/{post}/comments/{comment}', function ($postId, $commnectId) {

});
/*
    Paramter opsional tidak beda dengan parameter biasanya, perbedaannya adalah user dapat memasukkan nilai atau tidaknya.
*/

//Parameter Opsional
Route::get('user/{name?}', function ($name = null) {
    return $name;
});

Route::get('users/{name?}', function ($name = 'John') {
    return $name;
});

/*
    Expression constraint digunakan untuk membatasi url yang dimasukkan oleh user
*/
//Expression Constraint
Route::get('userconstrain/{name}', function ($name) {
    return 'Nama : ' + $name;
})->where('name', '[A-Za-z]+');

Route::get('userconstrain/{id}', function($id) {
    return 'id: ' + $id;
})->where('id', '[0-9]+');

Route::get('userconstrain/{id}/{name}', function ($id, $name) {
    return 'id: ' + $id + 'nama: ' + $name;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

/*
    Global Constraint sama persis dengan expression constraint tetapi berbentuk global.
*/

//Global Constraint
Route::get('userglobal/{idglobal}', function ($idglobal){
    return 'ID: ' + $idglobal;
});

/*
    Forward Slashes memungkinkan semua karakter bisa dimasukkan.
*/
//Forward Slashes
Route::get('search/{search}', function ($search){
    return $search;
})->where('search', '.*');

/*
    Named route adalah route bernama, biasanya digunakan untuk memanggil route pada view masing-masing.
*/

//Named Route
Route::get('userName/profile', function (){
    //
})->name('profile');

$url = route('profile');

return redirect()->route('profile');

Route::get('user/{id}/profile', function ($id) {
    //
})->name('profile');

$url = route('profile', ['id' => 1]);


Route::get('user/{id}/profile', function ($id) {
    //
})->name('profile');

$url = route('profile', ['id' => 1, 'photos' => 'yes']);

/*
    Middleware dapat diterapkan kepada sebuah group route dan middleware akan dijalankan sesuai urutan array.
*/

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        //
    });

    Route::get('user/profile', function() {
        //
    });

});
/*
    Namespace digunakan untuk mempersingkat pemanggilan url, yang awalnya seperti ini:
    = Admin/app/controller
    Menjadi seperti ini:
    = app/controller
*/
Route::namespace('Admin')->group(function () {
    //
});

/*
    Subdomain routing

    Subdomain routing bisa diberikan parameter seperti dibawah ini, memungkinkan anda menangkap nilai paramter.
*/

Route::domain('{account}.myapp.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

/*
    Prefix digunakan untuk menambahkan url didepan sebelum url yang dibuat.
    Contoh:
    - admin/users
*/

Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        //
    });
});
/*
    Berikut adalah prefix nama route, kurang lebih sama dengan prefix biasa tetapi ini penamaan route saja.
    contoh pemanggilan:
    - admin.users
*/
Route::name('admin.')->group(function () {
    Route::get('users', function () {
        
    })->name('users');
});

