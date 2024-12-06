<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Services\Car\CarService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    protected $service;
    public function __construct(CarService $CarService)
    {
      $this->service = $CarService;
    }
     /**
     * Retornar a lista de carro
     * @return JsonResponse Retorna os carro
     */
    public function index(): JsonResponse
    {   
        DB::beginTransaction();
        try { 
            $Car = $this->service->index();
            DB::commit();
         
            return response()->json([
                'status' => true,
                'Car' => $Car
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => 'Ocorreu um erro ao buscar os carros'
            ], 400);
        }
    }

    /**
     * Retorna um carro específico
     * @return JsonResponse Retorna um carro específico
     */
    public function show($car_id): JsonResponse
    {   
        DB::beginTransaction();
        try{
           
            $Car = $this->service->show($car_id);
            DB::commit();

            return response()->json([
                'status' => true,
                'Car' => $Car
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => 'Ocorreu um erro ao buscar o carro'
            ], 400);
        }
    }

    /**
     * Cria um novo carro
     * @return JsonResponse Retorna o carro cadastrado
     */

    public function store(CarRequest $request):JsonResponse
    { 
        DB::beginTransaction();
        try {
            $data = [
                'make' => $request->make,
                'model' => $request->model,
                'year' => $request->year,
            ];
             
            $car = $this->service->store($data);
            
            DB::commit(); 

            return response()->json([
                'status' => true,
                'Car' => $car
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Ocorreu um erro ao cadastrar carro'
            ], 400);
        }
    }

    /**
     * Atualiza um carro
     * @return JsonResponse Retorna o carro atualizado
     */
    public function update(CarRequest $request, $car_id):JsonResponse
    {
        DB::beginTransaction();

        try{
            $data = [
                'make' => $request->make,
                'model' => $request->model,
                'year' => $request->year,
            ];
            
            $Car = $this->service->update($car_id, $data);
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Carro atualizado com sucesso',
            ],200);

        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Ocorreu um erro ao atualizar o carro'
            ], 400);
        }

    }

    /**
     * Deleta um carro
     * @return JsonResponse Retorna o carro deletado
     */
    public function destroy($car_id):JsonResponse
    {
        DB::beginTransaction();
        try{
            $this->service->destroy($car_id);
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Carro excluído com sucesso'
            ], 200);
        }catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => 'Ocorreu um erro ao excluir o carro'
            ], 400);
        }
    }
}
