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
 * Gerenciamento de pragas.
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
     * "nome":["nome deve ser único."]
     * }
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validator = validator()->make($request->all(), [
            'nome' => 'required|unique:pragas,nome|min:3'
        ], $this->getCustomMessages());

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $nome = $request->get('nome');

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
     * @response  400 {
     * "pultura":["praga não encontrada."],
     * "nome":["nome deve ser único."]
     * }
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $params = $request->all();
        $params['praga'] = $id;
        $validator = validator()->make($params, [
            'praga' => 'required|exists:pragas,id',
            'nome' => 'required|unique:pragas,nome|min:3'
        ], $this->getCustomMessages());

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $praga = $this->repository->update($id, ['nome' => $params['nome']]);

        return response()->json($praga, 200);
    }


    /**
     * Deletar praga.
     * @response  404 {
     *  "message": "Praga não encontrada"
     * }
     * @response  200 {
     *  "message": "Deletado com sucesso"
     * }
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $praga = $this->repository->getById($id);
        if ($praga == null) {
            return $this->notFound('Praga não encontrada!');
        }

        $this->repository->delete($praga);

        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}
