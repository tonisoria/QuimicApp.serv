<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="API Química", version="1.0")
 *
 * @OA\Server(url="http://localhost/projecte_M14/quimica/apiLaravel/public")
 */
class PracticaController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
    * Create a new AuthController instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('auth:api', ['except' => ['']]);
   }
    
    // PRACTICA

    /**
     * @OA\Get(
     *   path="/api/practicas",
     *   tags={"practicas"},
     *   summary="Ver todas las practicas.",
     *   @OA\Response(
     *     response=200,
     *     description="Retorna todas las practicas.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="Se ha producido un error.",
     *   )
     * )
     */
    public function getPracticas()
    {
        return Practica::all();
    }

    /**
     * @OA\Get(
     *   path="/api/practica/{id}",
     *   tags={"practicas"},
     *   summary="Ver una practica concreto.",
     *   @OA\Parameter(
     *     name="id",
     *     description="id de la practica",
     *     required=true,
     *     in="path",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Retorna una practica concreto.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="Se ha producido un error.",
     *   )
     * )
     */
    public function getPractica($id)
    {
        return Practica::find($id);
    }

    /**
     * @OA\Put(
     *   path="/api/practica/{id}",
     *   tags={"practicas"},
     *   summary="Editar una practica concreta.",
     *   @OA\Parameter(
     *     name="id",
     *     description="id de la practica a editar",
     *     required=true,
     *     in="path",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="id_profesor",
     *     description="profesor que ha asignado la practica",
     *     required=false,
     *     in="query",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="id_compuesto_en_muestra",
     *     description="id del compuesto que pertenece a la muestra de la practica",
     *     required=false,
     *     in="query",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="fecha_inicio",
     *     description="fecha de inicio de la practica",
     *     required=false,
     *     in="query",
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *  @OA\Parameter(
     *     name="fecha_fin",
     *     description="fecha de fin de la practica",
     *     required=false,
     *     in="query",
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *  @OA\Parameter(
     *     name="enunciado",
     *     description="enunciado de la practica",
     *     required=false,
     *     in="query",
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Retorna la practica que hemos editado.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="Se ha producido un error.",
     *   )
     * )
     */
    public function updatePractica(Request $request)
    {
        $practica = Practica::find($request->id);
        $practica->update($request->all());

        return $practica;
    }

    /**
     * @OA\Post(
     *   path="/api/practica",
     *   tags={"practicas"},
     *   summary="Insertar una nueva practica.",
     *   @OA\Parameter(
     *     name="fecha_inicio",
     *     description="fecha de inicio de la practica",
     *     required=true,
     *     in="query",
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="fecha_fin",
     *     description="fecha de fin de la practica",
     *     required=true,
     *     in="query",
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="id_compuesto_en_muestra",
     *     description="id del compuesto que pertenece a la muestra de la practica",
     *     required=true,
     *     in="query",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *  @OA\Parameter(
     *     name="id_profesor",
     *     description="id del profesor que ha asignado la practica",
     *     required=true,
     *     in="query",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *  @OA\Parameter(
     *     name="enunciado",
     *     description="enunciado de la practica",
     *     required=false,
     *     in="query",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Retorna la practica que hemos insertado.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="Se ha producido un error.",
     *   )
     * )
     */
    public function insertPractica(Request $request)
    {
        $practica = new Practica;
        $practica->id_profesor = $request->id_profesor;
        $practica->id_compuesto_en_muestra = $request->id_compuesto_en_muestra;
        $practica->fecha_inicio = $request->fecha_inicio;
        $practica->fecha_fin = $request->fecha_fin;
        $practica->enunciado = $request->enunciado;

        $practica->save();
        return $practica;
    }

    /**
     * @OA\Delete(
     *   path="/api/practica/{id}",
     *   tags={"practicas"},
     *   summary="Eliminar una practica concreta.",
     *   @OA\Parameter(
     *     name="id",
     *     description="id de la practica",
     *     required=true,
     *     in="path",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
    

     *   @OA\Response(
     *     response=200,
     *     description="Se ha eliminado la practica correctamente.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="Se ha producido un error.",
     *   )
     * )
     */
    public function deletePractica($id)
    {
        $practica = Practica::find($id);

        $practica->delete();

        return $practica;
    }
}