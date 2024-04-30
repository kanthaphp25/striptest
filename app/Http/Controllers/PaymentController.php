<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;
use Stripe\StripeClient;
use App\Models\Products;

class PaymentController extends Controller
{
    private $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
    }
    public function strip_status()
	{
		return view('paymentsuccess');
	}
    public function checkout(Request $request)
	{
		$productdetails = Products::find($request->product_id);
		return view('payment',compact('productdetails'));
	}
	
    public function payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'cardNumber' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvv' => 'required'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors()->first());
            return response()->redirectTo('/stripstatus');
        }
/*         $token = $this->createToken($request);
        if (!empty($token['error'])) {
            $request->session()->flash('danger', $token['error']);
            return response()->redirectTo('/stripstatus');
        }
        if (empty($token['id'])) {
            $request->session()->flash('danger', 'Payment failed.');
            return response()->redirectTo('/stripstatus');
        }
        $charge = $this->createCharge($token['id'], $request->price);
 */       
		$charge = $this->createCharge($request->price);
        if (!empty($charge) && $charge['status'] == 'succeeded') {
            $request->session()->flash('success', 'Payment completed.');
        } else {
            $request->session()->flash('danger', 'Payment failed.');
        }
        return response()->redirectTo('/stripstatus');
    }

    private function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['cardNumber'],
                    'exp_month' => $cardData['month'],
                    'exp_year' => $cardData['year'],
                    'cvc' => $cardData['cvv'],
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($amount)
    {
        $charge = null;
        try {

			// $charge = $this->stripe->paymentIntents->create([
  // 'amount' => floor($amount),
  // 'currency' => 'usd',
  // 'payment_method' => 'pm_card_visa',
// ]);
 
              $charge = $this->stripe->charges->create([
                'amount' => floor($amount),
                'currency' => 'usd',
                //'card' => $tokenId,
				//'customer'=>'cus_Q18bRiUCeMX2DR',
				'source' => 'tok_visa',
                'description' => 'My first payment'
            ]);
         
 } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }
}
