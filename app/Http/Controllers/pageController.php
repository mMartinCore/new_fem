<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactsetting;
class pageController extends Controller
{
 


  public function sitemap()
    {
        return view('/sitemap');
    }


    public function rates()
    {
        return view('pages.rates.rates');
    }

    public function shippingPolicy()
    {
        return view('pages.shipping-policy');
    }

    public function refund()
    {
        return view('pages.refund');
    }

    public function price()
    {
        return view('pages.price');
    }

    public function about()
    {
        return view('pages.abouts.about');
    }

    public function contact()
     {
         $contact= new Contactsetting();
        if (session('client_team')->id!='') {
           
            $contact = Contactsetting::where('team_id', session('client_team')->id)->first();
          
        }
        return view('pages.contacts.contact',compact('contact'));
    }

    public function privacy()
    {
        return view('pages.privacy.privacy');
    }


    public function term_condition()
    {
        return view('pages.term_condition.term_condition');
    }

}
