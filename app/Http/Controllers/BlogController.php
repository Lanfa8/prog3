<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // busca os posts e os ordena pelo timestamp de criacao
        $posts = Blog::orderBy('created_at', 'desc')->get();

        return view('blog.index', ['posts' => $posts, 'pagina' => 'blog']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // retorna a view de criacao
        return view('blog.create', ['pagina' => 'blog']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $form)
    {
        //tratei só pra não quebrar, decidi não mostrar erro nem nada, tem que ser canalha pra não enviar nada
        if (empty($form->file('imagem')) || empty($form->titulo) || empty($form->descricao)){
            return redirect()->route('blog');
        }
        //salva imagem no armazenamento
        $imagemCaminho = $form->file('imagem')->store('', 'imagens');
        $post = new Blog();

        $post->titulo = $form->titulo; 
        $post->descricao = $form->descricao;
        $post->imagem = $imagemCaminho;

        //salva no banco
        $post->save();

        return redirect()->route('blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $post)
    {
        //retorna a view com o seu post
        return view('blog.show', ['post' => $post, 'pagina' => 'blog']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
