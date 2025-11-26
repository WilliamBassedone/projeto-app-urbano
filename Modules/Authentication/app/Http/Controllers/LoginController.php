<?php // Declara o início de um bloco de código PHP

namespace Modules\Authentication\app\Http\Controllers; // Define o namespace para o controlador, organizando o código no módulo de autenticação

use Illuminate\Http\JsonResponse; // Importa a classe JsonResponse para retornar respostas em formato JSON
use Illuminate\Http\Request; // Importa a classe Request para lidar com as requisições HTTP
use Illuminate\Routing\Controller; // Importa a classe base do controlador do Laravel

class LoginController extends Controller // Declara a classe LoginController que estende a classe Controller base
{
    /**
     * @param Request $request // Anotação de PHPDoc que indica que o método recebe um objeto Request
     * @return JsonResponse // Anotação de PHPDoc que indica que o método retorna um objeto JsonResponse
     */
    public function login(Request $request): JsonResponse // Define o método público 'login' que recebe um objeto Request e retorna um JsonResponse
    {
        $email = $request->input('email'); // Obtém o valor do campo 'email' da requisição
        $password = $request->input('password'); // Obtém o valor do campo 'password' da requisição

        if (($email === 'josi@gmail.com' && $password === '1234656A#') || // Verifica se o email e a senha correspondem a um dos pares de credenciais hardcoded
            ($email === 'sistema@gmail.com' && $password === '1234656A#')) { // Verifica o segundo par de credenciais hardcoded
            return response()->json(true); // Se as credenciais estiverem corretas, retorna uma resposta JSON com o valor 'true'
        }

        return response()->json(false); // Se as credenciais estiverem incorretas, retorna uma resposta JSON com o valor 'false'
    }
}