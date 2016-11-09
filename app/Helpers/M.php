<?php
namespace App\Helpers;

use DB;
use App\Models\EventType;
use App\Models\ServiceOptions;
use App\Models\ServiceList;
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

    static function verifyEmail($link, $email){
        $dUser = \App\User::where('vlink', $link)->where('email', $email)->first();

        if($dUser){
            $dUser->verify = true;
            $dUser->vlink = 0;
            $dUser->save();

            return true;
        }else{
            return false;
        }

    }

    static function addIntrest($name){
        $evt = new EventType;

        $evt->name = $name;

        return $evt->save();
    }

    static function getIntrests(){
        $data = EventType::where('visible', '1')->orderBy('name', 'asc')->get();

        $list = [];
        foreach($data as $d){
            $list[$d->id] = $d->name;
        }
        // dd($list);
        return $list;
        // return ['Fashion Show', 'Trade Fair', 'Career Fair', 'Talent Hunt', 'Talk Show', 'Training', 'Workshop',
        // 'Seminar', 'Corporate Party', 'Tourism', 'Dinner Party', 'Pool Party', 'Carnival', 'Wedding Ceremony',
        // 'Burial Ceremony', 'Engagement Party', 'Proposal Party', 'Convention', 'Sport Competition',
        // 'Award Ceremony', 'Road Trip', 'Naming Ceremony', 'Birthday Party', 'Contest', 'Coronation',
        // 'Ordination', 'Cookout'];
    }

    static function getServices(){
        $sos = ServiceOptions::orderBy('name', 'asc')->get();

        $services = [];
        foreach ($sos as $so) {
            $services[$so->name] = collect($so->children()->where("visible", "1")->orderBy('name', 'asc')->get())->lists('name')->toArray();
        }
        $os = $services["Other Services"];
        unset($services["Other Services"]);

        $services['Other Services'] = $os;

        return $services;

        //
        // return [
        //     "publicity"=>[
        //         'Graphics Design', 'Animation', 'Printing', 'Souvenir/Gift Management', 'Branding',
        //         'Event Website Management', 'Social Media Hype', 'Radio Jingles',
        //         'Television Advertisement', 'Billboard Advertisement'
        //     ],
        //     "Rentals" =>[
        //         'Chairs', 'Tables', 'Canopy and Tent', 'Toys', 'Bouncing Castle', 'Crockery Set',
        //         'Costume', 'Sound Equipment', 'Visual Equipment', 'Musical Instrument', 'Lighting',
        //         'Stage', 'Decoration Items', 'Halls', 'Garden and Park', 'Pool'
        //     ],
        //     "Logistics and transportation" => [
        //         "Transport", "Accommodation", "Decoration", "Cleaning Services", "Laundry Services",
        //         "Waste Disposal", "Parking Services"
        //     ],
        //     "Human Resource" => [
        //         "Make-up Artiste", "Models", "Ushers", "Bouncers", "Security Officials",
        //         "Master of Ceremony / Moderator", "Comedian", "Clown", "Dancer/ Dance Crew",
        //         "Musical Band", "Music Artiste", "Disc Jockey", "Public Speaker", "Religious Leader",
        //         "Caterer", "Waiter", "Undertaker", "Sound Engineer", "Videographer", "Photographer",
        //         "Fashion Designer"
        //     ],
        //     "Other Services" => [
        //         "Bouquet", "Cake and Snack", "Drink Supply", "Event Planning", "Saloon and Spa", "Wardrobe Management"
        //     ]
        // ];
    }

    static function getTotalTicketSales(){
        $tickets = \App\Models\Ticket::all();
        $sum = 0;
        foreach ($tickets as $t) {
            $sum += $t->total;
        }

        return $sum;
    }

    static function getAll()
    {
        $data = DB::table('admin_home')->first();

        return $data;
    }

    static function getCountries()
    {
        $data = DB::table('countries')->get();
        return $data;
    }

    static function getTagline($name)
    {
        $data = DB::table('admin_tagline')
        ->where('name', $name)
        ->first();

        return $data->tagline;
    }
    static function setTagline($name, $content)
    {
        DB::table("admin_tagline")
        ->where('name', $name)
        ->update(["tagline" => $content]);
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
            if(strpos($key, "_orda") !== FALSE || strpos($key, "_name") !== FALSE || strpos($key, "_logo") !== FALSE || strpos($key, "_link") !== FALSE && $key != "social_linkedin"){
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
                    $logos[$k]['logo'] = $value;
                }else{
                    $logos[$k] = ["logo" => $value];
                }
            }
            if(strpos($key, "_link") !== FALSE){
                $k = substr($key, 0, -5);
                if(isset($logos[$k])){
                    $logos[$k]['link'] = $value;
                }else{
                    $logos[$k] = ["link" => $value];
                }
            }
            if(strpos($key, "_orda") !== FALSE){
                $k = substr($key, 0, -5);
                if(isset($logos[$k])){
                    $logos[$k]['orda'] = $value;
                }else{
                    $logos[$k] = ["orda" => $value];
                }
            }
        }

        M::sortBySubkey($logos, 'orda');

        return $logos;
    }


    static function sortBySubkey(&$array, $subkey, $sortType = SORT_ASC) {
        foreach ($array as $subarray) {
            $keys[] = $subarray[$subkey];
        }
        array_multisort($keys, $sortType, $array);
    }

    static function getLogosLinks(){
        $data = DB::table('admin_home_links')->get();
        $names = [
            'main', 'event', 'consult', 'talk', 'shop', 'reformers',
            'fashion', 'technology'
        ];

        foreach ($names as $name) {
            foreach($data as $a){
                if($a->name == $name){
                    $newArray[$name][] = $a;
                }
            }
        }

        return $newArray;
    }

    static function addLogosLinks($details){
        DB::table("admin_home_links")
        ->insert($details);
    }

    static function removeLogosLinks($id){
        DB::table("admin_home_links")
        ->where("id", $id)
        ->delete();
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
