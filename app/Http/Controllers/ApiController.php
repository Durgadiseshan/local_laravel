<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;

class ApiController extends Controller
{
   
    public function handleRequest(Request $request)
    {
        if ($request->method() !== 'POST') {
            $errorMessage = 'The GET method is not supported for this route. Supported methods: POST.';
            return view('error', compact('errorMessage'));
        }
        // dd("test");
        $orderId = $request->input('order_id');
        $customerAddress = $request->input('customer_address');
        $customerPhone = $request->input('customer_phone');
        $time = $request->input('time');
        $paymentMode = $request->input('payment_mode');
        $amount = $request->input('amount');
        $status = $request->input('status');

        dd($orderId, $customerAddress, $customerPhone, $time, $paymentMode, $amount, $status);

        // Create an array with the data to be sent
        $data = [
            'status' => $status,
            'order_id' => $orderId,
            'customer_address' => $customerAddress,
            'customer_phone' => $customerPhone,
            'time' => $time,
            'payment_mode' => $paymentMode,
            'amount' => $amount
        ];

        $response = Http::post('http://127.0.0.1:8000/api/endpoint', $data);

    
        if ($response->successful()) {
            // Request was successful
            return response()->json(['message' => 'Request processed successfully']);
        } else {
            // Request failed
            return response()->json(['error' => 'Failed to process request'], $response->status());
        }
    
        $order = new Order();
        $order->order_id = $orderId;
        $order->customer_address = $customerAddress;
        $order->customer_phone = $customerPhone;
        $order->time = $time;
        $order->payment_mode = $paymentMode;
        $order->amount = $amount;
        $order->status = $status;
        $order->save();

        //email status
        if ($status == 0) {
            //failed
            $this->sendEmailNotification($customerAddress, 'Order Failed', 'Your order has failed. Please contact customer support for assistance.');
        } else {
            //success
            $this->sendEmailNotification($customerAddress, 'Order Success', 'Your order has been successfully processed. Thank you for your purchase.');
        }

        // Return a response
        return response()->json(['message' => 'Request processed successfully']);
    }

    // private function sendEmailNotification($email, $subject, $message)
    public function MyEmail($email, $name)
    {
        Mail::send('email', ['name' => $name], function ($message) use ($email, $name) {
            $message->to($email, $name)
                ->subject('Test eMail with an attachment from W3schools.');
            $message->from('hostmaster@flakpay.com', 'arya');
        });

        // Assuming $response is the HTTP response, handle it accordingly
        if ($response->successful()) {
            return "Email sent successfully!";
        } else {
            return "Failed to send email.";
        }
    }

    }

    