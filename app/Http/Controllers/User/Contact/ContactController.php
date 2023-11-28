<?php

namespace App\Http\Controllers\User\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        $title = 'Liên hệ';
        return view('user.contact.contact', compact('title'));
    }

    public function sendmessage(Request $request) {
        if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(500);
            exit();
        }
        
        $name = strip_tags(htmlspecialchars($_POST['name']));
        $email = strip_tags(htmlspecialchars($_POST['email']));
        $m_subject = strip_tags(htmlspecialchars($_POST['subject']));
        $message = strip_tags(htmlspecialchars($_POST['message']));
        
        $to = 'gumball678912345@gmail.com'; // Change this email to your //
        $subject = "$m_subject:  $name";
        $body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
        $header = "From: $email";
        $header .= " Reply-To: $email";	
        
        if(!mail($to, $subject, $body, $header))
            http_response_code(500);
    }
}