<?php
/**
 * @OA\Schema(
 *     title="PragaResource",
 *     description="Project resource",
 *     @OA\Xml(
 *         name="PragaResource"
 *     )
 * )
 */
class PragaResource
{
    /**
     * @OA\Property(
     *     title="Dados",
     *     description="Lista de pragas"
     * )
     *
     * @var \App\Models\Praga[]
     */
    private $data;
}
