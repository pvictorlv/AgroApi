<?php

namespace App\Http\Controllers;

use App\Models\Praga;
use App\Repositories\PragasRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Pragas
 * @authenticated
 *  Gerenciamento de pragas.
 */
class PragasController extends Controller
{
    private PragasRepository $repository;

    public function __construct(PragasRepository $repository)
    {
        $this->repository = $repository;

        $this->middleware('jwt.auth');
    }

    /**
     * Listar pragas.
     * @response  [{
     *  "id": 1,
     *  "nome": "Erva Daninha",
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
     * Criar nova praga.
     * @bodyParam nome string required Nome da praga, exemplo: Erva Daninha
     * @param Request $request
     * @response 201 {
     *  "id": 1,
     *  "nome": "Erva Daninha",
     *  "created_at": "2020-08-03 19:52:31",
     *  "updated_at": "2020-08-03 19:52:31"
     * }
     * @response  400 {
     *  "message": "Nome inválido ou muito curto"
     * }
     * @response  409 {
     *  "message": "Praga já cadastrada"
     * }
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $nome = $request->get('nome');

        if (!$nome || strlen($nome) < 3)
            return $this->badRequest('Nome inválido ou muito curto');

        if ($this->repository->pragaExistente($nome)) {
            return $this->conflict('Praga já existente');
        }

        $praga = $this->repository->create(['nome' => $nome]);

        return response()->json($praga, 201);
    }

    /**
     * Obter praga por ID.
     * @response  {
     *  "id": 1,
     *  "nome": "Erva Daninha",
     *  "created_at": "2020-08-03 19:52:31",
     *  "updated_at": "2020-08-03 19:52:31"
     * }
     * @response  404 {
     *  "message": "Praga não encontrada"
     * }
     * @param int $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $praga = $this->repository->getById($id);
        if ($praga == null)
            return $this->notFound('Praga não encontrada');

        return response()->json($praga);
    }

    /**
     * Editar praga.
     * @bodyParam nome string required Nome da praga, exemplo: Erva Daninha
     * @response  404 {
     *  "message": "Praga não encontrada"
     * }
     * @response  400 {
     *  "message": "Nome inválido ou muito curto"
     * }
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $praga = $this->repository->getById($id);
        if ($praga == null) {
            return $this->notFound('Praga não encontrada!');
        }
        $nome = $request->get('nome');
        if (!$nome || strlen($nome) < 3)
            return $this->badRequest('Nome inválido ou muito curto');

        $this->repository->update($praga, ['nome' => $nome]);

        return response()->json($praga, 200);
    }


    /**
     * Deletar praga.
     * @response  404 {
     *  "message": "Praga não encontrada"
     * }
     * @param int $id
     * @return JsonResponse|Response
     */
    public function destroy($id)
    {
        $praga = $this->repository->getById($id);
        if ($praga == null) {
            return $this->notFound('Praga não encontrada!');
        }

        $this->repository->delete($praga);

        return response()->setStatusCode(204);
    }
}
