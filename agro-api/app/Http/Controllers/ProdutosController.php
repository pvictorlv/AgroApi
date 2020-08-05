<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Repositories\ProdutosRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Produtos
 * @authenticated
 * Gerenciamento de Produtos.
 */
class ProdutosController extends Controller
{
    private ProdutosRepository $repository;

    public function __construct(ProdutosRepository $repository)
    {
        $this->repository = $repository;

        $this->middleware('jwt.auth');
    }

    /**
     * Listar Produtos.
     * @response  [{
     *  "id": 1,
     *  "nome": "Pesticida 1",
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
     * Criar novo Produto.
     * @bodyParam nome string required Nome do Produto, exemplo: Pesticida 1
     * @param Request $request
     * @response 201 {
     *  "id": 1,
     *  "nome": "Pesticida 1",
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
            'nome' => 'required|unique:produtos,nome|min:3'
        ], $this->getCustomMessages());

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $nome = $request->get('nome');

        $produto = $this->repository->create(['nome' => $nome]);

        return response()->json($produto, 201);
    }

    /**
     * Obter Produto por ID.
     * @response  {
     *  "id": 1,
     *  "nome": "Pesticida 1",
     *  "created_at": "2020-08-03 19:52:31",
     *  "updated_at": "2020-08-03 19:52:31"
     * }
     * @response  404 {
     *  "message": "Produto não encontrado"
     * }
     * @param int $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $produto = $this->repository->getById($id);
        if ($produto == null)
            return $this->notFound('Produto não encontrado');

        return response()->json($produto);
    }

    /**
     * Editar Produto.
     * @bodyParam nome string required Nome do Produto, exemplo: Pesticida 1
     * @response  400 {
     * "produto":["produto não encontrado."],
     * "nome":["nome deve ser único."]
     * }
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $params = $request->all();
        $params['produto'] = $id;
        $validator = validator()->make($params, [
            'produto' => 'required|exists:produtos,id',
            'nome' => 'required|unique:produtos,nome|min:3'
        ], $this->getCustomMessages());

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $nome = $request->get('nome');
        $produto = $this->repository->update($id, ['nome' => $nome]);

        return response()->json($produto, 200);
    }


    /**
     * Deletar Produto.
     * @response  404 {
     *  "message": "Produto não encontrado"
     * }
     * @response  200 {
     *  "message": "Deletado com sucesso"
     * }
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $produto = $this->repository->getById($id);
        if ($produto == null) {
            return $this->notFound('Produto não encontrado!');
        }

        $this->repository->delete($produto);

        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}
