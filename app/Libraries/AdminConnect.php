<?php
namespace App\Library;

class AdminConnect
{
    function __construct(){

    }

    function getAll()
    {
         $data = DB::table('admin_home')->first();

         return $data;
        // return view('user.index', ['users' => $users]);
    }
}


?>
