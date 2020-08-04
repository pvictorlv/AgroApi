<?php

namespace App\Http\Controllers;

use App\Models\Praga;
use App\Repositories\PragasRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PragasController extends Controller
{
    private PragasRepository $repository;

    public function __construct(PragasRepository $repository)
    {
        $this->repository = $repository;

        $this->middleware('jwt.auth');
    }


    /**
     * @OA\Get(
     *      path="/pragas",
     *      operationId="getPragas",
     *      tags={"Pragas"},
     *      summary="Obter lista de pragas",
     *      description="Retorna uma lista de pragas",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PragaResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    /**
     * Display a listing of the resource.
     *
     * @param PragasRepository $repository
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->repository->findAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
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
     * Display the specified resource.
     *
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
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id): Response
    {
        $this->repository->delete($id);

        return response()->setStatusCode(204);
    }
}
