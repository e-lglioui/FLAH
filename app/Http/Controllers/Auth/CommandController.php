<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use App\Models\Commande;
use App\Models\CommandeProduit;


class CommandController extends Controller
{

    public function mollie(Request $request)
    {
    

        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "10.00" // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Order #12345",
            "redirectUrl" => route('success'),
            // "webhookUrl" => route('webhooks.mollie'),
            "metadata" => [
                "order_id" => "12345",
            ],
        ]);

        //dd($payment);

        session()->put('paymentId', $payment->id);
        session()->put('quantity', $request->quantity);
    
        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function success(Request $request)
    {
        $paymentId = session()->get('paymentId');
        //dd($paymentId);
        $payment = Mollie::api()->payments->get($paymentId);
        //dd($payment);
        if($payment->isPaid())
        {
            $obj = new Payment();
            $obj->payment_id = $paymentId;
            $obj->product_name = $payment->description;
            $obj->quantity = session()->get('quantity');
            $obj->amount = $payment->amount->value;
            $obj->currency = $payment->amount->currency;
            $obj->payment_status = "Completed";
            $obj->payment_method = "Mollie";
            $obj->save();

            session()->forget('paymentId');
            session()->forget('quantity');

            echo 'Payment is successfull.';
        } else {
            return redirect()->route('cancel');
        }
    }

    public function cancel()
    {
        echo "Payment is cancelled.";
    }

}
