<?php

namespace App\Http\Controllers;

use App\Mail\MyMailSender;
use Illuminate\Http\Request;
use Mail;


class MailController extends Controller
{
	private $data;
	private $to_email, $mail_subject, $mail_body;
	public function mailSenderForm() {
		return view('emails-format.mail-send-form');
	}

	public function sendSimpleMail(Request $request) {
		$this->to_email = trim($request->email);
		$this->mail_subject = trim($request->subject);
		$this->mail_body = trim($request->message_body);
		$this->data = [
			'subject' => $this->mail_subject,
			'body' => $this->mail_body
		];

		try {
			Mail::to($this->to_email)
			// ->cc('abdnoman55@gmail.com')
			// ->bcc('abdnoman55@gmail.com')
			->send(new MyMailSender($this->data));
			return response()->json(['Successfully send mail, Please check your mailbox...']);
		} catch(\Exception $error) {
			// return response($error->getMessage());
			return response()->json(['Sorry something went wrong!']);
		}
	}

}
