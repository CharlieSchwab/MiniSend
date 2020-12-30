<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMail;
use App\Models\MailModel;


// This is a simple CRUD and Email Sending controller for the Mails


class MailController extends Controller
{

    // This is a test function intended to test sending emails with a static data

    public function sendtest(){
        $data = array(
            'sender' => "Charlie",
            'mail'=> "chrlschwb12@gmail.com",
            'recipient'=>"chrlschwb@gmail.com",
            'subject'=>'first test',
            'content'=> "hello charlie",
        );
        $fromEmail = "efef@ui.com";
        $fromName = "efefui.com";

        echo(json_encode($data));

        $newMail = new MailModel(['sender'   => $data['sender'],
                                    'recipient'  => $data['recipient'],
                                    'subject'    => $data['subject'],
                                    'content'    => $data['content']
                                    ]);

        $newMail->save();

        Mail::send('send_mail', $data, function($message) use ($fromEmail, $fromName)
        {   
            $message->from($fromEmail, $fromName);
            $message->to('chrlschwb@gmail.com', 'dotis')->subject('test message');
        });

        if( count(Mail::failures()) > 0 ) {

            foreach(Mail::failures as $email_address) {
                echo "$email_address <br />";
             }
         
         } else {
             echo "Mail sent successfully!";
         }
    }

    // A function to send a Mail

    public function send_mail(Request $request){

        $fromEmail = $request->sender;

        $data = array(
            'sender' => $request->sender,
            'recipient' => $request->recipient,
            'subject'=> $request->subject,
            'content'=> $request->content,
            'attach_utl'=> $request->attach_url
        );


        Mail::send('mail', $data, function($message) use ($fromEmail)
        {   
            $message->from($fromEmail);
            $message->to('otid91@gmail.com', 'dotis')->subject('Nouvelle soumission en ligne');
        });
    }


    // A function to create a new Mail

    public function create(Request $request){

        $mail = new MailModel(['sender'   => $request->input('sender'),
                        'recipient'  => $request->input('recipient'),
                        'subject'    => $request->input('subject'),
                        'content'    => $request->input('content')
                        ]);

        $mail->save();

        //$this->send_mail($mail);

        return response()->json('Mail successfully created');
    }


    // A function to show all mails, also the first function to get invoked 

    public function read_all(){
        
        $mails = MailModel::get();

        return $mails;
    }

    // A function to show a selected mail in detail

    public function read_one($id){

        $mail = MailModel::where('id','=',$id)->first();
        return response()->json($mail);
    }

    // A function to update a mail

    public function update($id, Request $request){

        $mail = MailModel::find($id);
        $mail -> update($request -> all());

        //$this->send_mail($mail);
        
        return response()->json('Mail successfully updated');
    }

    // A function to delete a mail

    public function delete($id){

        $mail = MailModel::find($id);
        $mail->delete();

        return response()->json('Mail successfully deleted');
    }
}
