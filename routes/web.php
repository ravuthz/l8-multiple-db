<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Post;
use App\Models\News;
use Spatie\QueryBuilder\QueryBuilder;

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

Route::get('/category', function() {
    $colums = ['id', 'name', 'note'];
    $items = QueryBuilder::for(Category::class)
    ->allowedFilters($colums)
    ->allowedSorts($colums)
    ->get();

    return $items;
});

Route::get('/post', function() {
    $colums = ['id', 'title', 'content'];
    $items = QueryBuilder::for(Post::class)
    ->allowedFilters($colums)
    ->allowedSorts($colums)
    ->get();

    return $items;
});

Route::get('/news', function() {
    $colums = ['id', 'title', 'content'];
    $items = QueryBuilder::for(News::class)
    ->allowedFilters($colums)
    ->allowedSorts($colums)
    ->get();

    return $items;
});