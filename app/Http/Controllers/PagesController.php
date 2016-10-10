<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Helpers\M;

class PagesController extends Controller
{
    public function index()
    {
        $logos = M::getLogos();
        $logosLinks = M::getLogosLinks();

        return view('welcome', compact("logos", "logosLinks"));
    }

    public function about()
    {
        $header = M::getAboutData("header");
        $description = M::getAboutData("description");
        $aboutImage = M::getAboutData("image");
        $logos = M::getAboutLogos();

        $testimonials =  M::getTestimonials();
        $partners = M::getPartners();
        $team = M::getTeam();
        $clients = M::getClients();

        $taglineP = M::getTagline("partners");
        $taglineC = M::getTagline("clients");
        $taglineT = M::getTagline("team");


        return view('about', compact("header", "description", "aboutImage", "clients",
                                    "logos", "testimonials", "team", "partners",
                                    "taglineP", "taglineC", "taglineT"));
    }

    public function whatWeDo()
    {
        $testimonials =  M::getTestimonials();
        $logos = M::getAboutLogos();

        return view('what-we-do', compact("logos", "testimonials"));
    }

    public function whoWeAre()
    {
        $partners = M::getPartners();
        $team = M::getTeam();
        $clients = M::getClients();

        return view('who-we-are', compact('partners', 'team', 'clients'));
    }

    public function advert()
    {
        $title = "Advertising / Partnership";
        $body = M::getDocuments("advertising");

        return view('pages', compact("title", "body"));
    }
    public function privacy()
    {
        $title = "Privacy Poilcy";
        $body = M::getDocuments("privacy_policy");

        return view('pages', compact("title", "body"));
    }
    public function terms()
    {
        $title = "How it Works";
        $body = M::getDocuments("terms_of_use");

        return view('pages', compact("title", "body"));
    }
    public function termsandconditions()
    {
        $title = "Terms and Conditions";
        $body = M::getDocuments("terms");

        return view('pages', compact("title", "body"));
    }
    public function faq()
    {
        $title = "Frequently Asked Question";
        $body = M::getDocuments("faq");

        return view('pages', compact("title", "body"));
    }
}
