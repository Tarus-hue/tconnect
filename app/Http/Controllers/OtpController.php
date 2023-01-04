<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Desma\Messaging\Sms;

class OtpController extends Controller {

    public function sendOtp() {
        $gateway = new Sms("nichkiprotich", "Eldoret2010");
        
        // generate otp
        $otp = rand(1000, 9999);

        $message = "Your OTP is ". $otp;

        $resp = $gateway->send($message, "254735929091");

         return view('user.auth.register');
    }
}