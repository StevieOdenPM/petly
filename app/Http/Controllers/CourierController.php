<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourierController extends Controller
{
    public function getTransactions()
    {
        $apiToken = session('api_token');
        $response = Http::withToken($apiToken)
                    ->get('http://petly.test:8080/api/courier/transaction-progress');
        
        $data = $response->json();
        return view('admin/order', [
            'transactions' => $data['data'] ?? [],
        ]);
    }  
}    
