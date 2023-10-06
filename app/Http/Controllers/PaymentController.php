<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function generateReference(Request $request)
    {
        // Generate a unique reference (customize this as needed)
        $reference = 'TXN' . date('YmdHis') . Str::random(8);

        // You can save the reference to the database or perform other actions here

        return response()->json(['reference' => $reference]);
    }

    public function handlePaystackCallback(Request $request)
    {
        // Process the Paystack callback and mark the payment as successful

        // Generate a unique token or identifier
        $token = bin2hex(random_bytes(16)); // Generates a random 32-character token

        // Associate the token with the user's email or identifier
        $userEmail = $request->input('email'); // Replace with the actual field containing the user's email
        Cache::put('payment_token_' . $userEmail, $token, now()->addDay()); // Store the token in the cache for 24 hours

        // Respond to Paystack with a JSON response
        return response()->json(['status' => 'success', 'token' => $token]);
    }


}
