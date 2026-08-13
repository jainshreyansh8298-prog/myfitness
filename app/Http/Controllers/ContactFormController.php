<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function index()
    {
        $forms = ContactForm::latest()->get();

        return view('admin.forms.index',compact('forms'));
    }

    public function show($id)
    {
        $form = ContactForm::findOrFail($id);
        return view('admin.forms.show',compact('form'));
    }

    public function destroy($id)
    {
        $contactForm = ContactForm::findOrFail($id);
        $contactForm->delete();

        return redirect()->route('admins.forms.index')
            ->with('success','Form Submission Deleted');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                  =>'required|string|max:255',
            'email'                  =>'required|string|max:255',
            'phone'                  =>'required|string|max:255',
            'purpose'                  =>'required|string|max:255',
            'comment'                  =>'required|string',
        ]);

        $contactForm = ContactForm::create([
            'name'                      =>$request->name,
            'email'                     =>$request->email,
            'phone'                     =>$request->phone,
            'purpose'                   =>$request->purpose,
            'comment'                   =>$request->comment,
        ]);

        // Send email to info@myfitness.ae
        try {
            Mail::to('info@myfitness.ae')->send(
                new ContactFormMail(
                    $request->name,
                    $request->email,
                    $request->phone,
                    $request->purpose,
                    $request->comment
                )
            );
        } catch (\Exception $e) {
            // Log the error but don't fail the request
            \Log::error('Failed to send contact form email: ' . $e->getMessage());
        }

        return redirect()->back()
            ->with('success', 'Thank you for contacting us! Your message has been sent successfully. We will get back to you soon.');
    }
}
