<?php

namespaceApp\Http\Controllers;

useApp\Models\tbllivros;
useIlluminate\Http\Request;
useIlluminate\Http\Response;
useIlluminate\Support\Facades\Validator;

classTbllivrosControllerextendsController{
    // Mostrar todos os registros da tabela livros// CRUD -> Read (leitura) Select/Visualizarpublicfunction index(){
        $regBook = tbllivros::all();
        $contador = $regBook->count();

        returnresponse()->json([
            'mensagem' => 'Livros encontrados',
            'quantidade' => $contador,
            'dados' => $regBook
        ], Response::HTTP_OK);
    }

    // Mostrar um registro específico// CRUD -> Read (leitura) Select/Visualizarpublicfunction show($id){
        $regBook = tbllivros::find($id);

        if ($regBook) {
            returnresponse()->json([
                'mensagem' => 'Livro localizado',
                'dados' => $regBook
            ], Response::HTTP_OK);
        } else {
            returnresponse()->json([
                'mensagem' => 'Livro não localizado'
            ], Response::HTTP_NOT_FOUND);
        }
    }

    // Cadastrar um novo registro// CRUD -> Create (criar/cadastrar)publicfunction store(Request $request){
        $validator = Validator::make($request->all(), [
            'nomeLivro' => 'required',
            'generoLivro' => 'required',
            'anoLivro' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            returnresponse()->json([
                'mensagem' => 'Dados inválidos',
                'erros' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST);
        }

        $regBook = tbllivros::create($request->all());

        returnresponse()->json([
            'mensagem' => 'Livro cadastrado com sucesso',
            'dados' => $regBook
        ], Response::HTTP_CREATED);
    }

    // Atualizar um registro existente// CRUD -> Update (alterar)publicfunction update(Request $request, $id){
        $regBook = tbllivros::find($id);

        if (!$regBook) {
            returnresponse()->json([
                'mensagem' => 'Livro não localizado'
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'nomeLivro' => 'sometimes|required',
            'generoLivro' => 'sometimes|required',
            'anoLivro' => 'sometimes|required|numeric'
        ]);

        if ($validator->fails()) {
            returnresponse()->json([
                'mensagem' => 'Dados inválidos',
                'erros' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST);
        }

        $regBook->update($request->all());

        returnresponse()->json([
            'mensagem' => 'Livro atualizado com sucesso',
            'dados' => $regBook
        ], Response::HTTP_OK);
    }

    // Deletar um registro// CRUD -> Delete (apagar)publicfunction destroy($id){
        $regBook = tbllivros::find($id);

        if (!$regBook) {
            returnresponse()->json([
                'mensagem' => 'Livro não localizado'
            ], Response::HTTP_NOT_FOUND);
        }

        $regBook->delete();

        returnresponse()->json([
            'mensagem' => 'Livro deletado com sucesso'
        ], Response::HTTP_OK);
    }
}
