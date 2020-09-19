<?php

namespace Tests\Feature\Mail;

use App\Mail\MailOrder;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;

class MailTest extends TestCase
{

    public function testSendMail()
    {
        // メール送信しない
        Mail::fake();
        // メール送信
        Mail::to("test@com.com")->send(new MailOrder());
        // メール送信後、検証
        Mail::assertSent(MailOrder::class, function ($mail) {
            $mail->build();
            return $mail->hasFrom('from@example.com') &&
                $mail->hasCc('bccbcc@example.com') &&
                $mail->subject === 'Subject!One';
        });
    }

    public function testSendMailBody()
    {
        $this->assertTrue(true);
    }
}
