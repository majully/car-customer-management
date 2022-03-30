<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Resources\Cliente as ClienteResource;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente;
        $cliente->nome = $request->input('nome');
        $cliente->telefone = $request->input('telefone');
        $cliente->cpf = $request->input('cpf');
        $cliente->placa_carro = $request->input('placa_carro');

        if (Cliente::where('cpf', $cliente->cpf)->count() <= 0) {
            if($cliente->save()) {
                return new ClienteResource( $cliente );
            }
        } else {
            return response()->json([
                "message" => "Cliente informado já possui cadastro!"
            ], 412);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOne($id)
    {
        if (Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::findOrFail( $id );
            return new ClienteResource( $cliente );
        } else {
            return response()->json([
                "message" => "Cliente não encontrado!"
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPlate($numero)
    {
        if (Cliente::where('placa_carro', 'like', '%'.$numero)->exists()) {
            $clientes_placa = Cliente::where('placa_carro', 'like', '%'.$numero)->get();
            return ( $clientes_placa );
        } else {
            return response()->json([
                "message" => "Clientes com o final da placa informado não foi localizados!"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::findOrFail( $request->id );
            $cliente->nome = $request->input('nome');
            $cliente->telefone = $request->input('telefone');
            $cliente->cpf = $request->input('cpf');
            $cliente->placa_carro = $request->input('placa_carro');

            if($cliente->save()) {
                return response()->json([
                    "message" => "Cadastro do cliente atualizado com sucesso!"
                ], 200);
            }
        } else {
            return response()->json([
                "message" => "Cliente não encontrado!"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::findOrFail( $id );
            if($cliente->delete()) {
                return response()->json([
                    "message" => "Cliente deletado com sucesso!"
                ], 202);
            }
        } else {
            return response()->json([
                "message" => "Cliente não encontrado!"
            ], 404);
        }
    }
}
