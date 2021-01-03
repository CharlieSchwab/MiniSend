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

    public function register(Request $request)
    {
        $data = $request->validate([
            'avatar'   => ['image'],
            'name'     => ['required', 'string'],
            'email'    => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);

        //echo json_encode($data);

        $file = $request->file('avatar');
        $path = '/avatars/';
        $filename = uniqid().".".$file->extension();
        $file->storePubliclyAs( $path, $filename,'public');
        $data['avatar'] = storage_path('app/public').$path.$filename;

        return $data;
    }


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
        $fromName = "efefui@yu.com";

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


    // A function to create a new Mail and send it

    public function create(Request $request){
       
        $data = $request->validate([
            'sender'     => ['required', 'email'],
            'recipient'    => ['required', 'email'],
            'subject' => ['required', 'string'],
            'content' => ['required', 'string']
        ]);

        $data['status'] = "posted";

        $file = null;

        if($request->file('attach_file')){
            $file = $request->file('attach_file');
            $name = uniqid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);
            $data['attach_url'] = $name;
        }

        $mail = new MailModel($data);

        $mail->save();

        // echo(json_encode($data));

        if($file == null){
            Mail::send('mail', $data, function($message) {
                $message->to($data['recipient'])->subject($data['subject']);
                $message->from($data['sender']);
            });
        }else{
            Mail::send('mail', $data, function($message) {
                $message->to($data['recipient'])->subject($data['subject']);
                $message->from($data['sender'])->attach($file);
            });
        } 
        
        return response()->json($mail);
    }


    // A function to show all mails, also the first function to get invoked 

    public function read_all(){
        
        $mails = MailModel::get();

        return $mails;
    }

    // A function to show a selected mail in detail

    public function read_one($id){

        $mail = MailModel::where('id','=',$id)->first();
        $mail['file_url'] = storage_path('app/public/').$mail['attach_url'];
        return response()->json($mail);
    }

    // A function to update a mail and resend it

    public function update($id, Request $request){

        $data = $request->validate([
            'sender'     => ['required', 'email'],
            'recipient'    => ['required', 'email'],
            'subject' => ['required', 'string'],
            'content' => ['required', 'string']
        ]);

        if($request->file('attach_file')){
            $file = $request->file('attach_file');
            $name = uniqid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);
            $data['attach_url'] = $name;
        }

        $mail = MailModel::find($id);
        $mail -> update($data);

        if($file == null){
            Mail::send(['text'=>'mail'], $data, function($message) {
                $message->to($data['recipient'])->subject($data['subject']);
                $message->from($data['sender']);
            });
        }else{
            Mail::send(['text'=>'mail'], $data, function($message) {
                $message->to($data['recipient'])->subject($data['subject']);
                $message->from($data['sender'])->attach($file);
            });
        }

        return response()->json($mail);

    }

    // A function to delete a mail

    public function delete($id){

        $mail = MailModel::find($id);
        $mail->delete();

        return response()->json('Mail successfully deleted');
    }
}
