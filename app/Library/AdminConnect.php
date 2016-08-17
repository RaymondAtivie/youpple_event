<?php

class AdminConnect
{

    function getAll()
    {
         $data = DB::table('admin_home')->first();

         return $data;
        // return view('user.index', ['users' => $users]);
    }
}


?>
