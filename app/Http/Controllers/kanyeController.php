<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Http;
use DB;

class kanyeController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|min:6',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $createtoken = $user->createToken('')->plainTextToken;
            $token = explode('|', $createtoken)[1];
    
            return response()->json([
                'success' => true,
                'token' => $token,
            ], 200);
        } else {
            return response("username or password mismatch");
        }
    }
    public function showData(Request $request)
    {
        try {
            if ($request->user()) {
                $response = Http::get('https://raw.githubusercontent.com/ajzbc/kanye.rest/master/quotes.json');
                $data = $response->json();
                $flip = array_flip($data);
                $randVal = array_rand($flip, 5);
                
                return response()->json([
                    'success' => 'fetched quotes',
                    'randVal' => $randVal,
                ], 200);
            } else {
                return response()->json([
                    'error' => 'Unauthenticated',
                ], 401);
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch quotes',
            ], 500);
        }
    }
    
 
}
