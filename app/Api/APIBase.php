<?php 
namespace App\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class APIBase {

    protected $client; 
    protected $provider;

    const API_BASE_PATTH = 'https://qa-app.capcito.com/api/v3/work-sample/';

    public function __construct($provider)
    {
        $this->provider = $provider;
        $this->createClient();
    }

    private function createClient()
    {
        $this->client = new Client([
            'base_uri' => self::API_BASE_PATTH,
            'timeout' => 2.0
        ]);
    }


    public function getInvoice($invoiceId)
    {   
        
        try {

            $response = $this->client->request('GET', 'invoices/' . $this->provider . '/' . $invoiceId); 
            
            //Since the test mentions a DTO, I understand that maybe you don't want to return all the fields from this invoice to the client
            //but you want to control the fields that are going to be returned
            //for this test (and because of the time available) I am going to use only the 5 first fields from the invoice to be converted and returned to the user as a DTO
            //I will simulate a DTO using a Laravel resource 

            $resource = static::toDTO(json_decode($response->getBody()));

            return response()->json($resource, $response->getStatusCode()); 


        } catch (ClientException $e) {

            $response = $e->getResponse();

            return response()->json([
                'error' => $response->getReasonPhrase()
            ], $response->getStatusCode()); 
           
        }
        
    }

    
}