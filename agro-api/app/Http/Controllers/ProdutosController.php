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
 *  Gerenciamento de Produtos.
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
     * Criar nova Produto.
     * @bodyParam nome string required Nome do Produto, exemplo: Pesticida 1
     * @param Request $request
     * @response 201 {
     *  "id": 1,
     *  "nome": "Pesticida 1",
     *  "created_at": "2020-08-03 19:52:31",
     *  "updated_at": "2020-08-03 19:52:31"
     * }
     * @response  400 {
     *  "message": "Nome inválido ou muito curto"
     * }
     * @response  409 {
     *  "message": "Produto já cadastrado"
     * }
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $nome = $request->get('nome');

        if (!$nome || strlen($nome) < 3)
            return $this->badRequest('Nome inválido ou muito curto');

        if ($this->repository->ProdutoExistente($nome)) {
            return $this->conflict('Produto já existente');
        }

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
     * @response  404 {
     *  "message": "Produto não encontrado"
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
        $produto = $this->repository->getById($id);
        if ($produto == null) {
            return $this->notFound('Produto não encontrado!');
        }
        $nome = $request->get('nome');
        if (!$nome || strlen($nome) < 3)
            return $this->badRequest('Nome inválido ou muito curto');

        $this->repository->update($produto, ['nome' => $nome]);

        return response()->json($produto, 200);
    }


    /**
     * Deletar Produto.
     * @response  404 {
     *  "message": "Produto não encontrado"
     * }
     * @param int $id
     * @return JsonResponse|Response
     */
    public function destroy($id)
    {
        $produto = $this->repository->getById($id);
        if ($produto == null) {
            return $this->notFound('Produto não encontrado!');
        }

        $this->repository->delete($produto);

        return response()->setStatusCode(204);
    }
}
