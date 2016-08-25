<?php

Route::group([
    'prefix'=>'api'
], function(){
    Route::get('vote/{contestant}', function(Contestant $contestant){
        $contestant->increment('vote');
        $contestant->save();

        return $contestant;
    });
})

?>
