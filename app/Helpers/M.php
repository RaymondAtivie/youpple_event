<?php
namespace App\Helpers;

use DB;

/**
*
*/
class M
{
    static function flash($message, $status='info')
    {
        session()->flash("issue_status", $status);
        session()->flash("issue_message", $message);
    }

    static function getAll()
    {
        $data = DB::table('admin_home')->first();

        return $data;
    }

    static function getDocuments($doc)
    {
        $data = DB::table('admin_home')->first();

        return $data->$doc;
    }

    static function setDocuments($doc, $content)
    {
        DB::table("admin_home")
        ->where('id', 1)
        ->update([$doc => $content]);
    }

    static function getSocials(){
        $data = DB::table('admin_home')->first();

        foreach ($data as $key => $value) {
            if(strpos($key, "social_") !== FALSE){
                $k = substr($key, 7);
                $socials[$k] = $value;
            }
        }

        return $socials;
    }

    static function getLogos(){
        $data = DB::table('admin_home')->first();

        foreach ($data as $key => $value) {
            if(strpos($key, "_name") !== FALSE || strpos($key, "_logo") !== FALSE){
                $ls[$key] = $value;
            }
        }

        foreach ($ls as $key => $value) {
            if(strpos($key, "_name") !== FALSE){
                $k = substr($key, 0, -5);
                if(isset($logos[$k])){
                    $logos[$k]['name'] = $value;
                }else{
                    $logos[$k] = ["name" => $value];
                }
            }
            if(strpos($key, "_logo") !== FALSE){
                $k = substr($key, 0, -5);
                if(isset($logos[$k])){
                    $logos[$k]['link'] = $value;
                }else{
                    $logos[$k] = ["link" => $value];
                }
            }
        }

        return $logos;
    }
}


?>
