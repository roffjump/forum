<?php

Route::get('/truncate/migrate/seed',function(){
	foreach (DB::select('SHOW TABLES') as $table) {
		$name = $table->Tables_in_homestead;

	    if ($name == 'migrations') {
	        continue;
	    }

	    try {
	    	DB::table( $name )->truncate();
	    } catch (Exception $e) {
	    	
	    }
	}

	Artisan::call('migrate', ["--force"=> true]);
	Artisan::call('db:seed', ["--force"=> true]);
});