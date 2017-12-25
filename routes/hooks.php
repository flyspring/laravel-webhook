<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Hooks Routes
|--------------------------------------------------------------------------
|
*/
Route::post('deploy', 'WebhookController@webhook')->name('webhook.deploy');

