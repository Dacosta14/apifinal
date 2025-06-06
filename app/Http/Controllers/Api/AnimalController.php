<?php

namespace App\Http\Controllers\Api;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnimalController extends Controller
{
/**
* Display a listing of the resource.
*/
public function index()
{
//Buscando todos animais
$registros = ApiAnimal::all();
//Contando o número de registros
$contador = $registros->count();
//Verificando se há registros
if($contador > 0) {
return response()->json([
'success' => true,
'message' => 'Animais encontrados com sucesso!',
'data' => $registros,
'total' => $contador
], 200);
}else {
return response()->json([
'success' => false,
'message' => 'Nenhum animal encontrado.',
], 404);
};
}
/**
* Store a newly created resource in storage.
*/
public function store(Request $request)
{
//Validação dos dados recebidos
$validator = Validator::make($request->all(), [
'tipo' => 'required',
'raca' => 'required',
'nome'=> 'required',
'idade'=> 'required'
]);
if($validator->fails()) {
return response()->json([
'success' => false,
'message' => 'Registros inválidos',
'errors' => $validator->errors()
], 400);
}
$registros = ApiAnimal::create($request->all());
if($registros) {
return response()->json([
'success' => true,
'message' => 'Animal cadastrado com sucesso!',
'data' => $registros
], 201);
} else {
return response()->json([
'success' => false,
'message' =>'Erro ao cadastrar o animal'
], 500);
}
}
/**
* Display the specified resource.
*/
public function show( $id)
{
//Buscando o animal pelo ID
$registros = ApiAnimal::find($id);
//Verificando se o animal foi encontrado
if($registros){
return response()->json([
'success' => true,
'message' => 'Animal localizado com sucesso!',
'data' => $registros
]);
}
else{
return response()->json([
'success' => false,
'message' => 'Animal não localizado!'
], 404);
}
}
/**
* Update the specified resource in storage.
*/
public function update(Request $request, string $id)
{
$validator = Validator::make($request->all(), [
'tipo' => 'required',
'raca' => 'required',
'nome' => 'required',
'idade' => 'required'
]);
if ($validator->fails()) {
return response()->json([
'success' => false,
'message' => 'Registros inválidos',
'errors' => $validator->errors()
], 400);
}
//Encontrando o animal no banco
$registrosBanco = ApiAnimal::find($id);
if (!$registrosBanco) {
return response()->json([
'success' => false,
'message' => 'Animal não encontrado'
], 404);
}
//Atualizando os dados
$registrosBanco->tipo= $request->tipo;
$registrosBanco->raca= $request->raca;
$registrosBanco->nome= $request->nome;
$registrosBanco->idade= $request->idade;
//Salvando as alterações
if ($registrosBanco->save()) {
return response()->json([
'success' => true,
'message' => 'Animal atualizado com sucesso!',
'data' => $registrosBanco
], 200);
} else {
return response()->json([
'success' => false,
'message' => 'Erro ao atualizar o animal'
], 500);
}
}
/**
* Remove the specified resource from storage.
*/
public function destroy($id)
{
$registros = ApiAnimal::find($id);
if(!$registros) {
return response()->json([
'success' => false,
'message' => 'animal não encontrado'
], 404);
}
if ($registros->delete()) {
return response()->json([
'success' => true,
'message' => 'animal deletado com sucesso'
], 200);
}
return response()->json([
'success' => false,
'message' => 'Erro ao deletar o animal'
], 500);
}
}
