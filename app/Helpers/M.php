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

    static function getAboutLogos(){
        $data = DB::table('admin_about')->first();

        foreach ($data as $key => $value) {
            if(strpos($key, "_name") !== FALSE || strpos($key, "_logo") !== FALSE || strpos($key, "_desc") !== FALSE){
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
            if(strpos($key, "_desc") !== FALSE){
                $k = substr($key, 0, -5);
                if(isset($logos[$k])){
                    $logos[$k]['desc'] = $value;
                }else{
                    $logos[$k] = ["desc" => $value];
                }
            }
        }

        return $logos;
    }

    static function setAboutData($data, $content){
        DB::table("admin_about")
        ->where('id', 1)
        ->update([$data => $content]);
    }

    static function getAboutData($data){
        $row = DB::table('admin_about')->first();

        return $row->{$data};
    }

    // TEAM FUNCTIONS //
    static function addTeam($teamDetails)
    {
        DB::table("admin_team")
        ->insert($teamDetails);
    }
    static function getTeam()
    {
        return DB::table("admin_team")->get();
    }

    static function removeTeam($teamId)
    {
        DB::table("admin_team")
        ->where("id", $teamId)
        ->delete();
    }


    // Partner FUNCTIONS //
    static function addPartner($partnerDetails)
    {
        DB::table("admin_partners")
        ->insert($partnerDetails);
    }
    static function getPartners()
    {
        return DB::table("admin_partners")->get();
    }

    static function removePartner($partnerId)
    {
        DB::table("admin_partners")
        ->where("id", $partnerId)
        ->delete();
    }

    // Testimonial FUNCTIONS //
    static function addTestimony($testimonyDetails)
    {
        DB::table("admin_testimonials")
        ->insert($testimonyDetails);
    }
    static function getTestimonials()
    {
        return DB::table("admin_testimonials")->get();
    }

    static function removeTestimony($testimonyId)
    {
        DB::table("admin_testimonials")
        ->where("id", $testimonyId)
        ->delete();
    }

    // Clients FUNCTIONS //
    static function addClient($clientDetails)
    {
        DB::table("admin_clients")
        ->insert($clientDetails);
    }
    static function getClients()
    {
        return DB::table("admin_clients")->get();
    }
    static function removeClient($clientId)
    {
        DB::table("admin_clients")
        ->where("id", $clientId)
        ->delete();
    }
}


?>
