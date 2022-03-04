<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
class LoginController extends ApiController
{
public function login(Request $request)
{
$validator = Validator::make($request->all(), [
'email' => 'required|email',
'password' => 'required',
'remember_me' => 'boolean',
]);
if ($validator->fails()) {
return $this->errorResponse($validator->errors(), 401);
}
$credentials = request(['email', 'password'], 'remember_me');
if (!Auth::attempt($credentials)) {
return response()->json([
'message' => 'Correo y/o contraseña incorrectos'
], 401);
}

$user = $request->user();

if ($user->email_verified_at == NULL) {
return response()->json(['error' => 'Por favor verifica tu email'], 401);
}

$tokenResult = $user->createToken('Personal Access Token');
$token = $tokenResult->token;

if (!$request->remember_me) {
$token->expires_at = Carbon::now()->addDay(1);
}

$token->save();

return response()->json([
'access_token' => $tokenResult->accessToken,
'token_type' => 'Bearer',
'expires_at' => Carbon::parse(
$tokenResult->token->expires_at
)
->toDateTimeString(),
]);
}
public function logout(Request $request)
{
$request->user()->token()->revoke();
return response()->json(['message' =>
'Salió exitosamente']);
}
}