<?php

namespace App\Traits;

use Start;
use Start_Error;
use Start_Charge;

trait MyTechnologyPayFortStart {

    private $payfortStartCharge, $payfortErrorCode, $payfortErrorMessage;
    
    public function initPayFortStart() {
        # Setup the Start object with your private API key
        Start::setApiKey(env('PAYFORT_START_API_SECRET_KEY'));
        $this->payfortStartCharge = [];
    }

    public function processPayFortStartCharge($request, $totalAmount) {
        try {
            $this->payfortStartCharge = Start_Charge::create([
                        "amount" => $totalAmount * 100, // amount in cents
                        "currency" => 'USD',
                        "card" => $request->get('token'),
                        "email" => $request->get('payer_email'),
                        "ip" => $request->ip(),
                        "description" => "Go Rich Ticket(s)"
            ]);
            /*
             * PAYMENT SUCCESSFUL
             */
            return true;
        } 
        catch (Start_Error $e) {
            $this->payfortErrorCode = $e->getErrorCode();
            $this->payfortErrorMessage = $e->getMessage();
        }
        return FALSE;
    }
    
    

}
