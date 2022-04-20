<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    private function authCheck()
    {
        if (Auth::check()) {
            return Auth::user()->name;
        }
    }

    public function contactList()
    {
        $username = $this->authCheck();
        if ($username != '') {
            $contactList = Contact::all();
            return view('contactList', compact('username', 'contactList'));
        } else {
            return redirect("/");
        }
    }

    public function contactDetailPage($id)
    {
        $username = $this->authCheck();
        $contactDetail = Contact::find($id);
        return view('contactDetailPage', compact('username', 'contactDetail'));
    }

    public function addContactPage()
    {
        $username = $this->authCheck();
        return view('addContactPage', compact('username'));
    }

    public function addContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|',
            'phone' => 'required|min:10'
        ]);

        $contact = new Contact([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone')
        ]);
        $contact->save();
        return redirect('contactList')->with('success', 'Contact added!');
    }


    public function editContactPage($id)
    {
        $username = $this->authCheck();
        $contactDetail = Contact::find($id);
        return view('editContactPage', compact('username', 'contactDetail'));
    }


    public function editContact(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|',
            'phone' => 'required|min:10'
        ]);
        $contact = Contact::find($id);
        $contact->name =  $request->get('name');
        $contact->email = $request->get('email');
        $contact->phone = $request->get('phone');
        $contact->save();

        return redirect('/contactList')->with('success', 'Contact updated!');
    }


    public function deleteContact($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contactList')->with('success', 'Contact deleted!');
    }
}
