<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    /** 
     * Exibe o formulario de cadastro de usuarios 
     */
    
    public function create()
    {
        return view('users.create');
    }

    /** 
     * Armazena um novo usuario no banco de dados com validação 
     */

    public function store(Request $request)
    {
        $dadosValidos = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        //Persistência no banco usando o ORM Eloquent
        User::create($dadosValidos);

        //Redireciona para a página de administração com uma mensagem de sucesso
        return redirect('/admin')->with('sucesso', 'Usuário criado com sucesso!');
    }
}
