<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //Criação do usuário no banco de dados
    public function store(UserRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request -> name,
                'email' => $request -> email,
                'password' => $request -> password,
            ]);

            DB::commit();

            return response() -> json([
                'status' => true,
                'user' => $user,
                'message' => 'Usuário cadastrado com sucesso!',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();

            return response() -> json([
                'status' => false,
                'message' => 'Erro ao cadastrar usuário, por favor tente novamente!',
            ], 400);
        }
    }

    //Exibe todos os usuários do banco de dados em ordem descrescente
    public function index(): JsonResponse
    {
        $users = User::orderBy('id', 'DESC') -> get();
        return response()-> json([
            'status' => true,
            'users' => $users,
        ], 200);
    }

    //Exibe as informações de um usuário específico, retornando no formato JSON
    public function show(User $user): JsonResponse
    {
        return response() -> json([
            'status' => true,
            'users' => $user,
        ], 200);
    }

    //Atualiza os dados de um usuário existente no banco de dados
    public function update(UserRequest $request, User $user): JsonResponse
    {
        DB::beginTransaction();

        try {
            $user -> update([
                'name' => $request -> name,
                'email' => $request -> email,
                'password' => $request -> password,
            ]);

            DB::commit();

            return response() -> json([
                'status' => true,
                'user' => $user,
                'message' => 'Usuário editado com sucesso!',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();

            return response() -> json([
                'status' => false,
                'message' => 'Erro ao editar usuário, por favor tente novamente!',
            ], 400);             
        }
    }

    //Excluir usuário do banco de dados
    public function destroy(User $user): JsonResponse
    {
        try {
            $user -> delete();
 
            return response() -> json([
                'status' => true,
                'user' => $user,
                'message' => 'Usuário excluído com sucesso!',
            ], 200);
            
        } catch (Exception $e) {
            return response()-> json([
                'status' => false,
                'message' => 'Erro ao excluir usuário, por favor tente novamente!',
            ], 400);
        }
    }
}
