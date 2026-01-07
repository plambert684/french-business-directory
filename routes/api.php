<?php

    use App\Models\User;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Validation\ValidationException;

    Route::post('/tokens/create', function (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'token_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Les identifiants fournis sont incorrects.'],
            ]);
        }

        $token = $user->createToken($request->token_name, ['check-status', 'get-establishments', 'get-legal-units']);

        return ['token' => $token->plainTextToken];
    });

    Route::apiResource('etablissements',
        App\Http\Controllers\EtablissementsController::class
    )->middleware(['auth:sanctum', 'abilities:check-status,get-establishments']);

    Route::apiResource('unites_legales',
        App\Http\Controllers\UnitesLegalesController::class
    )->middleware(['auth:sanctum', 'abilities:check-status,get-legal-units']);
