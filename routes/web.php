<?php

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

use App\League;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('league', 'LeagueController');

Route::post('league/{league}/invitation', 'InvitationController@leagueInvitationStore')->name('league.invitation');

//Route::get('leagues/{league}/teams/create/{?token}', 'TeamController@storeByInvitation')
//    ->name('teams.storeByInvitation');

Route::resource('team', 'TeamController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('invitation/mail', function () {

    $league = League::find(1);
    return new App\Mail\Invitation($league, $league->invitations->first());
});
