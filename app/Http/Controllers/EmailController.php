<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EmailController extends Controller
{

    public function sendOrgInvitationWithQRCode(Request $request){

        $validatedField = $request->validate([
            'email' => 'required|email',
        ]);

        $org = Auth::user()->orgRep->organization;


        Mail::to($validatedField['email'])->send(new InvitationMail($org->name, $org->code));

    }

    public function qrCode(){
      return QrCode::size(300)->generate('A basic example of QR code!');
    }

}

