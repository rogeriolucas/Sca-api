<?php

namespace App\Http\Controllers\API ;



use Illuminate\Support\Facades\File;
use App\Models\Home_consulta;
use Illuminate\Http\Request;
use App\Htpp\Controllers\Controller;

class Controle_Acesso extends Controller 
{
    
    /**
     * Valida o usuario e retorna os dados 
     */
    
    public function Home_consulta(Request $request)
    {    
        
        $request->validate([
                'Nome_do_Usuario'=>'required',
                'jme'   => 'required',
                'Descrição_da_Função' => 'nullable',
                'Descrição_do_Sistema' => 'nullable ',   
                'Descrição_do_Grupo' => 'required'

            ]);

            try {
                $Home_consulta = $Home::pegarPermissoesController(
                $request->  Nome_do_Usuario,
                $request->Jme,
                $request->Descrição_da_Função,
                $request->Descrição_do_Sistema,
                $request->Descrição_do_Grupo,
            );
           
            if(empty($Home_consulta)){
              throw new Exception('A consulta foi concluída, mas nao retornou resultados.');
            }
            
            return responde()->json([
                $Home_consulta,
                'mensagem' => 'Pesquisa realizada com sucesso.'

            ],200);

        } catch (\Throwable $th){
            return response()->json([
                'mensagem' => $th->getMessage()
            ],404);

        }        
            
    }    
    
    // Alteração_permissoes
            public function AlterarHome_consultaController( $request, $id)
            {
                $request->validate([
                    'Nome_do_Usuario' => 'required'
                ]);

                try{
                    $Home_consulta = Home_consulta::pegarHome_consultaControle($request->Nome_do_usuario);
                    
                    if (empty($Home_consultas)){
                        throw new Exception ('Nao foi possível Consultar as permissoes.');
                    }
                    return response()->json([
                    'mensagem' =>'SCA-API' . $request->Nome_do_Usuario . 'Permissao feita com sucesso.'
                    ],200);
                } catch (\Throwable $th){
                    return response()->json([
                        'mensagem' => $th->getMessage()
                    ],404);    
                }    
            }        
                public function ExcluirPermissoesController(Request $request ,$jme);
                {
                    $request .validate([   
                        'cod_permissao' => 'required',
                        'Nome_do_Usuario' => 'required',
                    ]);
                    
                    Home::ExcluirPermissoesController($request-> cod_permissao);
                    
                    File::delete(public_path('storage/'.$request->cod_permissao));

                    return response()->json([
                        'mensagem' => 'Permissao excluida com sucesso.'
                    ],200);
                } catch (\Throwable $th){
                    return response()->json([
                        'mensagem' => $th->getMessage()
                    ],404);
                }
            }

            
            
            
            public function IncluirConsultasController(Request $request, $id)
            {
                $Home_consultas = $IncluirConsultasController::pegarInclusaoController($request->Nome)
                
                if(empty($Home_consulta)){
                    throw new Exception ('Nao foi possível Incluir as permissoes.');
                }               
                return response()->json([
                    $InclusaoController 
                ], 200);    
            }

            public function ConsultaController(Request $request,$id)

            $Home_consultas = $ConsultaController::pegarConsultaController($request-> Nome);
             if(empty($Home_consulta)){
                throw new Exception ('Não foi possível informações do produzione.');
                }
                return response()->json([
                $ConsultaController
            ], 200);
    }        


}