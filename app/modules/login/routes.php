<?php

Route::resource('/login', 'LoginController',
                array('only' => array('index', 'show')));
