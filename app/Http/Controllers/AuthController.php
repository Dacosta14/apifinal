<?php

namespace App\Http\Controllers\Api;

use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validador = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:perfis',
            'password' => 'required|min:6',
        ]);

        if ($validador->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validador->errors()
            ], 400);
        }

        $perfil = Perfil::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $perfil->createToken('api-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Perfil registrado com sucesso!',
            'token' => $token,
            'data' => $perfil
        ], 201);
    }

    public function login(Request $request)
    {
        $perfil = Perfil::where('email', $request->email)->first();

        if (!$perfil || !Hash::check($request->password, $perfil->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Credenciais inválidas.'
            ], 401);
        }

        $token = $perfil->createToken('api-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login realizado com sucesso!',
            'token' => $token,
            'data' => $perfil
        ]);
    }
}
