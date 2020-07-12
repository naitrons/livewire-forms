<?php

Route::group(['middleware' => 'web'], function () {
    Route::post('/livewire-forms/file-upload', function () {
        return call_user_func([request()->input('component'), 'fileUpload']);
    })->name('livewire-forms.file-upload');
});
