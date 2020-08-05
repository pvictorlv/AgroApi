<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getCustomMessages(): array
    {
        return [
            'required' => ' O atributo :attribute é obrigatório.',
            'exists' => ':attribute não encontrado.',
            'unique' => ':attribute deve ser único.',
            'min' => ':attribute deve ter pelo menos :min caracteres.'
        ];
    }

    protected function badRequest(string $message): JsonResponse
    {
        return response()->json(['message' => $message], 400);
    }

    protected function conflict(string $message): JsonResponse
    {
        return response()->json(['message' => $message], 409);
    }

    protected function notFound(string $message): JsonResponse
    {
        return response()->json(['message' => $message], 404);
    }
}
