<?php

namespace App\Http\Controllers;


use App\Models\tbllivros;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\tbllivros;

class tbllivrosController extends Controller
{
    //construir o crud.

    //mostrar todos os registros da tabela livros
    //crud-> Read(leitura) Select/Visualizar
    public function index(){
     $regBook = tbllivros:: All();
     $contador= $regBook-> count();

     return 'Livros'.$contador.$regBook.Response() -> json([],Response::HTTP_NO_CONTENT);
    }

index();

 Livros:
    //Mostrar um tipo de registro especifico
    //crud-> Read(leitura) Select/Visualizar

    show (10) -> select * from tabela where id=$id
    
        public function show(string $id){ //A função show busca a id e retorna se os livros foram localizados.
        $regBook = tbllivros::find($id);

        if($regBook){
            return 'Livros Localizados:'; $regBook.response()->json([],Response::HTTP_NO_CONTENT)

        }else{
            return'Livros não Localizados:';$regBook.response()->json([],Response::HTTP_NO_CONTENT)
        }
        }
    }

    //Cadastrar registros
    ////crud-> Create (criar/cadastrar)
    public function store(Request $request){
        $request = $request->All();

        $regVeriq = Validator::make($regBook,[
            'nomeLivro' =>' required'
            'generoLivro' =>' required'
            'anoLivro' =>' required'
        ]);

        if($regVerifiq->fails()){
            
            return 'Livros Inválidos:'; .Response()->json([],Response::HTTP_NO_CONTENT) 

        }
        $regBookCad = tbllivros::create($regBook);

        if(){
            return 'Livros Cadastrados:'; $regBook.response()->json([],Response::HTTP_NO_CONTENT) 
        }else{
            return 'Livros não cadastrados:'; $regBook.response()->json([],Response::HTTP_NO_CONTENT)
        }
        }
    }
    //alterar registros
    //Crud -> update(alterar)
    public function update(){

    }

    //deletar os registros
    //crud -> delete(apagar)
    public function destroy(){

    }
}
