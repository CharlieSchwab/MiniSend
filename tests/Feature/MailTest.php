<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use App\Mail\NewMail;

class MailTest extends TestCase
{

    // A test function to see if the mailable is sent

    public function test_mailable_is_sent()
    {
        Mail::fake();

        Mail::assertNothingSent();
  
        Mail::assertQueued(Mail::class);
    }


    // A test function to see if the mailable's content is correct

    public function test_mailable_content()
    {
        $mailable = new NewMail(['sender' => 'test@gmail.com',
                                'recipient' => 'chrlschwb@gmail.com',
                                'subject' => 'Email test',
                                'content' => 'If this is received, it is good'
                                ]);

        $mailable->assertSeeInHtml('it is good');
        $mailable->assertSeeInText('it is good');
    }
}
