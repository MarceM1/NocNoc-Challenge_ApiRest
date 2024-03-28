<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Lógica de autenticación
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('auth_token');
            $response = [
                'success' => true,
                'token' => $token->plainTextToken,
                'user' => $user, 
            ];
            return response()->json($response, 200)->header('Access-Control-Allow-Origin', 'http://localhost:5173');
        } else {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }
    }
}
