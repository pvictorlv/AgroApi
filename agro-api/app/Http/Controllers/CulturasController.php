<?php

namespace App\Http\Controllers;

use App\Models\Cultura;
use App\Repositories\CulturasRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Culturas
 * @authenticated
 * Gerenciamento de Culturas.
 */
class CulturasController extends Controller
{
    private CulturasRepository $repository;

    public function __construct(CulturasRepository $repository)
    {
        $this->repository = $repository;

        $this->middleware('jwt.auth');
    }

    /**
     * Listar Culturas.
     * @response  [{
     *  "id": 1,
     *  "nome": "Soja",
     *  "created_at": "2020-08-03 19:52:31",
     *  "updated_at": "2020-08-03 19:52:31"
     * }]
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->repository->findAll());
    }

    /**
     * Criar nova Cultura.
     * @bodyParam nome string required Nome da Cultura, exemplo: Soja
     * @param Request $request
     * @response 201 {
     *  "id": 1,
     *  "nome": "Soja",
     *  "created_at": "2020-08-03 19:52:31",
     *  "updated_at": "2020-08-03 19:52:31"
     * }
     * @response  400 {
     *  "message": "Nome inválido ou muito curto"
     * }
     * @response  409 {
     *  "message": "Cultura já cadastrada"
     * }
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $nome = $request->get('nome');

        if (!$nome || strlen($nome) < 3)
            return $this->badRequest('Nome inválido ou muito curto');

        if ($this->repository->CulturaExistente($nome)) {
            return $this->conflict('Cultura já existente');
        }

        $cultura = $this->repository->create(['nome' => $nome]);

        return response()->json($cultura, 201);
    }

    /**
     * Obter Cultura por ID.
     * @response  {
     *  "id": 1,
     *  "nome": "Soja",
     *  "created_at": "2020-08-03 19:52:31",
     *  "updated_at": "2020-08-03 19:52:31"
     * }
     * @response  404 {
     *  "message": "Cultura não encontrada"
     * }
     * @param int $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $cultura = $this->repository->getById($id);
        if ($cultura == null)
            return $this->notFound('Cultura não encontrada');

        return response()->json($cultura);
    }

    /**
     * Editar Cultura.
     * @bodyParam nome string required Nome da Cultura, exemplo: Soja
     * @response  404 {
     *  "message": "Cultura não encontrada"
     * }
     * @response  400 {
     *  "message": "Nome inválido ou muito curto"
     * }
     * @response  {
     *  "id": 1,
     *  "nome": "Soja",
     *  "created_at": "2020-08-03 19:52:31",
     *  "updated_at": "2020-08-03 19:52:31"
     * }
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $cultura = $this->repository->getById($id);
        if ($cultura == null) {
            return $this->notFound('Cultura não encontrada!');
        }
        $nome = $request->get('nome');
        if (!$nome || strlen($nome) < 3)
            return $this->badRequest('Nome inválido ou muito curto');

        $this->repository->update($cultura, ['nome' => $nome]);

        return response()->json($cultura);
    }


    /**
     * Deletar Cultura.
     * @response  404 {
     *  "message": "Cultura não encontrada"
     * }
     * @response  200 {
     *  "message": "Deletado com sucesso"
     * }
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $cultura = $this->repository->getById($id);
        if ($cultura == null) {
            return $this->notFound('Cultura não encontrada!');
        }

        $this->repository->delete($cultura);

        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}
