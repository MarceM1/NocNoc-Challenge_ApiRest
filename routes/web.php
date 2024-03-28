<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', function (Request $request) {
    // ... tu lógica de autenticación (validar email y password) ...

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {

        $token = $user->createToken('auth_token');

        $response = [
            'success' => true,
            'token' => $token->plainTextToken,
            'user' => $user, // Opcional: incluye información del usuario
        ];
        return response()->json($response, 200);
        
    } else {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
});

// Route::group(['prefix'=>'api/v1', 'namespace'=>'App\Http\Controllers'], function(){
//     Route::apiResource('users', UserController::class);
//     Route::apiResource('tasks', TaskController::class);
//     Route::apiResource('comments', CommentController::class);
//     Route::apiResource('files', FileController::class);

// });

// Route::get('/setup', function(){
//     $credentials=[
//         'email'=>'admin@admin.com',
//         'password'=> 'password'
//     ];
//     if(!Auth::attempt($credentials)){
//         $user =  new \App\Models\User();
//         $user->name  = 'Admin';
//         $user->role  = 0;
//         $user->email  = $credentials['email'];
//         $user->password  = Hash::make($credentials['password']);
//         $user->save();
//     }
//     if(Auth::attempt($credentials)){
//         $user=Auth::user();
//         $adminToken = $user->createToken('');
//         $token = $user->createToken('auth_token')->plainTextToken;
//     }
     
// });