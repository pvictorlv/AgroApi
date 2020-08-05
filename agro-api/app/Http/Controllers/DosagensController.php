<?php

namespace App\Http\Controllers;

use App\Repositories\CulturasRepository;
use App\Repositories\DosagensRepository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use PDF;
use Psy\Util\Json;
use Sabberworm\CSS\Rule\Rule;

/**
 * @group Dosagens
 * @authenticated
 * Gerenciamento de Dosagens.
 */
class DosagensController extends Controller
{
    private DosagensRepository $repository;


    public function __construct(DosagensRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('jwt.auth');
    }

    /**
     * Gerar relatório.
     * @queryParam cultura int ID da cultura, exemplo: 1
     * @queryParam produto int ID do produto, exemplo: 2
     * @queryParam praga int ID da praga, exemplo: 1
     * @param Request $request
     * @return Response
     * @response 200
     * @throws BindingResolutionException
     */
    public function exportPdf(Request $request): Response
    {
        $dosagens = $this->repository->search($request->produto, $request->cultura, $request->praga);

        $pdf = app()->make('dompdf.wrapper');

        return $pdf->loadView('layout-pdf', compact('dosagens'))
            ->download('dosagens.pdf');
    }

    /**
     * Listar dosagens.
     * @queryParam cultura int ID da cultura, exemplo: 1
     * @queryParam produto int ID do produto, exemplo: 2
     * @queryParam praga int ID da praga, exemplo: 1
     * @response 200 [{
     * "id": 1,
     * "cultura_id": 1,
     * "praga_id": 2,
     * "produto_id": 1,
     * "dosagem": "100ml por litro",
     * "created_at": "2020-08-05T02:54:16.000000Z",
     * "updated_at": "2020-08-05T02:54:16.000000Z"
     * }]
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return \response()->json($this->repository->search($request->produto, $request->cultura, $request->praga));
    }

    /**
     * Criar uma nova dosagem.
     * @bodyParam dosagem string required Dosagem, exemplo: 100ml por litro
     * @bodyParam cultura int required ID da cultura, exemplo: 1
     * @bodyParam produto int required ID do produto, exemplo: 2
     * @bodyParam praga int required ID da praga, exemplo: 1
     * @response 201 {
     * "id": 1,
     * "cultura_id": 1,
     * "praga_id": 2,
     * "produto_id": 1,
     * "dosagem": "100ml por litro",
     * "created_at": "2020-08-05T02:54:16.000000Z",
     * "updated_at": "2020-08-05T02:54:16.000000Z"
     * }
     *
     * @response 400 {
     * "praga":["praga não encontrada."],
     * "cultura":["cultura não encontrada."],
     * "produto":["produto não encontrada."],
     * }
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validator = validator()->make($request->all(), [
            'dosagem' => 'required|string',
            'cultura' => 'required|exists:culturas,id',
            'praga' => 'required|exists:pragas,id',
            'produto' => 'required|exists:produtos,id',
        ], $this->getCustomMessages());

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $dosagem = $this->repository->search($request->produto, $request->cultura, $request->praga);
        if ($dosagem != null && $dosagem->isNotEmpty()) {
            return response()->json(['dosagem' => ['Você só pode ter uma dosagem por combinação de produto, cultura e praga']], 400);
        }

        $dosagem = $this->repository->create(
            [
                'cultura_id' => $request->cultura,
                'praga_id' => $request->praga,
                'produto_id' => $request->produto,
                'dosagem' => $request->dosagem,
            ]
        );

        return \response()->json($dosagem, 201);
    }

    /**
     * Obter dosagem por ID.
     * @response  {
     * "id": 1,
     * "cultura_id": 1,
     * "praga_id": 2,
     * "produto_id": 1,
     * "dosagem": "100ml por litro",
     * "created_at": "2020-08-05T02:54:16.000000Z",
     * "updated_at": "2020-08-05T02:54:16.000000Z"
     * }
     * @response  404 {
     *  "message": "Dosagem não encontrada"
     * }
     * @param int $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $dosagem = $this->repository->getById($id);
        if ($dosagem == null)
            return $this->notFound('Dosagem não encontrada');

        return response()->json($dosagem);
    }

    /**
     * Atualizar dosagem.
     * @bodyParam dosagem string required Dosagem, exemplo: 100ml por litro
     * @bodyParam cultura int required ID da cultura, exemplo: 1
     * @bodyParam produto int required ID do produto, exemplo: 2
     * @bodyParam praga int required ID da praga, exemplo: 1
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = validator()->make($request->all(), [
            'dosagem' => 'required|string',
            'cultura' => 'required|exists:culturas,id',
            'praga' => 'required|exists:pragas,id',
            'produto' => 'required|exists:produtos,id',
        ], $this->getCustomMessages());

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $dosagem = $this->repository->update($id, $validator->validated());

        return response()->json($dosagem);
    }

    /**
     * Deletar dosagem.
     * @response  404 {
     *  "message": "Dosagem não encontrada"
     * }
     * @response  200 {
     *  "message": "Deletado com sucesso"
     * }
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $dosagem = $this->repository->getById($id);
        if ($dosagem == null) {
            return $this->notFound('Dosagem não encontrada!');
        }

        $this->repository->delete($dosagem);

        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}
