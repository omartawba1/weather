<?php

Route::group(['prefix' => 'v1'], function () {
    Route::get('predict', 'PredictionController@index')->name('predictions.index');
});
