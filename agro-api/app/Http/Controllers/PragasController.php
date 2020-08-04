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
     * @response  {
     *  "id": 1,
     *  "nome": "Erva Daninha",
     *  "created_at": "2020-08-03 19:52:31",
     *  "updated_at": "2020-08-03 19:52:31"
     * }
     * @response  400 {
     *  "message": "Nome inválido"
     * }
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $nome = $request->get('nome');
        if (!$nome || strlen($nome) < 3)
            return $this->badRequest('Nome inválido');

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
     * @param int $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $praga = $this->repository->getById($id);
        if ($praga == null)
            return response()->setStatusCode(404);

        return response()->json($praga);
    }

    /**
     * Editar praga.
     * @bodyParam nome string required Nome da praga, exemplo: Erva Daninha
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Deletar praga.
     * @param int $id
     * @return Response
     */
    public function destroy($id): Response
    {
        $this->repository->delete($id);

        return response()->setStatusCode(204);
    }
}
