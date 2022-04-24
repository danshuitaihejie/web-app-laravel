<?php

use App\Http\Livewire\IndexComponent;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\DiagramComponent;
use App\Http\Livewire\PublicDiagramsComponent;
use Illuminate\Support\Facades\Route;
use App\Modules\WeiXin\WeiXinService;
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

Route::get('/', IndexComponent::class);

Route::get('/dashboard', DashboardComponent::class)->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('diagrams', DiagramComponent::class)->middleware('auth')->name('diagrams');
Route::get('public-diagrams', PublicDiagramsComponent::class);

Route::get('diagrams/new', [DiagramComponent::class, 'new']); //must be before 'diagrams/{id}'
Route::post('diagrams', [DiagramComponent::class, 'createNew'])->middleware('auth');

Route::get('diagrams/{id}', [DiagramComponent::class, 'show']);
Route::post('diagrams/{id}/content', [DiagramComponent::class, 'updateContent'])->middleware('auth');
Route::post('diagrams/{id}/image', [DiagramComponent::class, 'updateImage'])->middleware('auth');

Route::get('auth/weixinweb/redirect',[WeiXinService::class,'redirectToLogin'])->name('wx.login.redirect');
Route::get('auth/weixinweb/callback', [WeiXinService::class,'loginCallback'])->name('wx.login.callback');
