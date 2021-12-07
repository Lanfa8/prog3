<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsuariosController extends Controller
{
    public function index()
    {
        var_dump(Auth::user());
        $usuarios = Usuario::orderBy('id', 'asc')->get();

        return view('usuarios.index', ['usuarios' => $usuarios, 'pagina' => 'usuarios']);
    }

    public function create()
    {
        return view('usuarios.create', ['pagina' => 'usuarios']);
    }

    public function insert(Request $form)
    {
        $usuario = new Usuario();

        $usuario->nome = $form->nome;
        $usuario->email = $form->email;
        $usuario->usuario = $form->usuario;
        $usuario->password = Hash::make($form->password);

        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    // Ações de login
    public function login(Request $form)
    {
        // Está enviando o formulário
        if ($form->isMethod('POST'))
        {
            $credenciais = $form->validate([
                'usuario' => ['required'],
                'password' => ['required'],
                ]);
               
                // Tenta o login
                if (Auth::attempt($credenciais))
                {
                    session()->regenerate();
                    return redirect()->route('home');
                }
                else 
                {
                    return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos.');
                }

        }

        return view('usuarios.login');
    }

    public function logout()
    {
        session()->forget('usuario');
        return redirect()->route('home');
    }
}
