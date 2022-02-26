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

        if($cliente->save()) {
            return new ClienteResource( $cliente );
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
        $cliente = Cliente::findOrFail( $id );
        return new ClienteResource( $cliente );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPlate($numero)
    {
        $clientes_placa = Cliente::where('placa_carro', 'like', '%'.$numero)->get();
        return ( $clientes_placa );
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
        $cliente = Cliente::findOrFail( $request->id );
        $cliente->nome = $request->input('nome');
        $cliente->telefone = $request->input('telefone');
        $cliente->cpf = $request->input('cpf');
        $cliente->placa_carro = $request->input('placa_carro');

        if($cliente->save()) {
            return new ClienteResource( $cliente );
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
        $cliente = Cliente::findOrFail( $id );
        if($cliente->delete()) {
            return new ClienteResource( $cliente );
        }
    }
}
