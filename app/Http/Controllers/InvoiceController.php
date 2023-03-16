<?php

namespace App\Http\Controllers;
use App\Api\Fortsocks;
use App\Api\Vizma;

use Illuminate\Support\Facades\Validator;


class InvoiceController extends Controller
{
    const API_URL = 'App\\Api\\';

    public function index($provider, $invoiceID)
    {
        //String validation 
        $validator = Validator::make(
            ['provider'     => $provider], 
            ['provider'     => 'required|string|in:vizma,fortsocks'],
            ['invoice'      => $invoiceID], 
            ['invoice'      => 'required|string']

        );

        if ($validator->fails()) {
            return response()->json([
                'errors' => [
                    'message' => $validator->errors()
                ]
            ]);
        }

        $invoiceProvider = resolve(self::API_URL . $provider); 
        
        return $invoiceProvider->getInvoice($invoiceID);
        
    }
    
    
}
