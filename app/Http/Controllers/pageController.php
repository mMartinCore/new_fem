<?php

namespace App\Http\Controllers;

use App\Mail\contactMessage;
use Illuminate\Http\Request;
use App\Models\Contactsetting;

use Illuminate\Support\Facades\Mail;

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


    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|max:100|min:4',
            'message' => 'required|string|min:7|max:255'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'link' => url()->current()
           ];
  
     try {
        Mail::to('lordvorkkloc@gmail.com')->send(new contactMessage($data)); 
        return redirect()->back()->with('message', 'Your message has been sent successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Your message could not be sent try again later');
        }
    } 
    
    public function contact()
     {
         $contact= new Contactsetting;
        if (session()->has('client_team')) {
          // dd(session('client_team')->id);  
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
