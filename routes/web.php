<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PerfilController;
use Kreait\Firebase\Auth as FirebaseAuth;

Route::post('/firebase-login', function(Request $request, FirebaseAuth $auth) {
    $token = $request->input('token');

    try {
        $verifiedIdToken = $auth->verifyIdToken($token);
        $firebaseUid = $verifiedIdToken->claims()->get('sub');

        // Tente achar usuário local pelo Firebase UID
        $user = \App\Models\User::where('firebase_uid', $firebaseUid)->first();

        if (!$user) {
            // Criar usuário local novo
            $firebaseUser = $auth->getUser($firebaseUid);
            $user = \App\Models\User::create([
                'name' => $firebaseUser->displayName ?? 'Sem Nome',
                'email' => $firebaseUser->email,
                'firebase_uid' => $firebaseUid,
                // outros campos que quiser
            ]);
        }

        // Loga usuário no Laravel
        auth()->login($user);

        return response()->json(['success' => true]);
    } catch (\Throwable $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
});

Route::resource('animais', AnimalController::class);
Route::resource('perfil', PerfilController::class);
