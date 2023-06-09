<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Contact;
use App\User;
use App\Tenant;
use Carbon\Carbon;
use Auth;
use App\Jobs\SendEmailJob;

use App\Mail\Userapproved;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tenants = Tenant::All();
        $contacts = User::where('user_type', 'tenant')
            ->WhereNull('email_verified_at')
            ->Where('status', 1)
            ->get();

        //  $contacts = User::with('tenant')->get();




        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ]);

        $contact = new Contact([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'job_title' => $request->get('job_title'),
            'city' => $request->get('city'),
            'country' => $request->get('country')
        ]);
        $contact->save();
        return redirect('/contacts')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = User::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required'
        ]);

        $contact = User::find($id);

        if ($request->user_type == 'reject') {
            $contact->status = 0;
            $contact->flex1 = Auth::user()->name;
            $contact->user_type = $request->user_type;
        } else {

            $contact->name =  $request->get('name');
            $contact->mobile = $request->get('mobile');
            $contact->email = $request->get('email');
            $contact->email_verified_at = Carbon::now();
            $contact->flex1 = Auth::user()->name;
            $contact->user_type = $request->user_type;

            $details['email'] = $contact->email;
            dispatch(new SendEmailJob($details));
        }




        $contact->save();

        // Mail::send(new Userapproved($contact));
        // $details['subject'] = "Account Approved";



        return redirect('/contacts')->with('success', 'User Account Approved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contact deleted!');
    }
}
