<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use function response;

/**
 * @group Autenticação
 * Gerenciamento de sessão.
 */
class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Realizar login.
     * @response {
     * "access_token": "xxxxx.yyyy.zzzz",
     * "token_type": "bearer",
     * "expires_in": 3600
     * }
     * @bodyParam email string required Email do usuário, exemplo: Admin@Admin.com
     * @bodyParam senha string required Senha do usuário, exemplo: 123456
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {

        $custom_messages = [
            'required' => 'O atributo :attribute não pode ficar em branco.'
        ];

        $validator = validator()->make($request->all(), [
            'email' => 'required|string|email|max:100',
            'senha' => 'required|string',
        ], $custom_messages);

        if ($validator->fails()) {
            return $this->badRequest($validator->errors()->toJson());
        }


        if (!$token = auth()->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('senha')
        ])) {
            return response()->json(['message' => 'Usuário ou senha incorreto'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Registrar novo usuário.
     * @bodyParam nome string required Nome do usuário, exemplo: Admin
     * @bodyParam email string required Email do usuário, exemplo: Admin@Admin.com
     * @bodyParam senha string required Senha do usuário, exemplo: 123456
     * @response  {
     *  "nome": "testes",
     *  "email": "123@123.com",
     *  "updated_at": "2020-08-04T20:28:24.000000Z",
     *  "created_at": "2020-08-04T20:28:24.000000Z",
     *  "id": 7
     * }
     * @response 400 {
     * "email":["email deve ser único."],
     * "senha":["senha deve ter pelo menos 6 caracteres."]
     * }
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        $custom_messages = [
            'required' => 'O atributo :attribute não pode ficar em branco.',
            'unique' => ':attribute deve ser único.',
            'min' => ':attribute deve ter pelo menos :min caracteres.'
        ];

        $validator = validator()->make($request->all(), [
            'nome' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:usuarios',
            'senha' => 'required|string|min:6',
        ], $custom_messages);


        if ($validator->fails()) {
            return $this->badRequest($validator->errors()->toJson());
        }

        $user = Usuario::create(array_merge(
            $validator->validated(),
            ['senha' => Hash::make($request->senha)]
        ));

        return response()->json($user, 201);
    }

    /**
     * Obter o usuário autenticado.
     * @authenticated
     * @response {
     * "id": 7,
     * "nome": "testes",
     * "email": "123@123.com",
     * "created_at": "2020-08-04T20:28:24.000000Z",
     * "updated_at": "2020-08-04T20:28:24.000000Z"
     * }
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    /**
     * Finalizar e invalidar a sessão atual.
     * @authenticated
     * @response {
     *  "message": "Deslogado com sucesso!"
     * }
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Deslogado com sucesso!']);
    }

    /**
     * Atualizar o token.
     * @authenticated
     * @response {
     * "access_token": "xxxxx.yyyy.zzzz",
     * "token_type": "bearer",
     * "expires_in": 3600
     * }
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Obter a resposta do token em json.
     * @param string $token
     * @return JsonResponse
     */
    private function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
