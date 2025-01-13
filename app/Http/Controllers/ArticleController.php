<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = Article::with('category')->orderBy('id', 'desc')->paginate(5); //Esto es para evitar la carga ansiosa
        return view('articles.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::select('id', 'nombre')->orderBy('nombre')->get();
        return view('articles.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());

        Article::create($request->all());
        return redirect()->route('articles.index')->with('mensaje', 'Artículo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.detalle', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categorias = Category::select('id', 'nombre')->orderBy('nombre')->get();
        return view('articles.edit', compact('article', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate($this->rules($article->id));
        $article->update($request->all());

        return redirect()->route('articles.index')->with('mensaje', "Artículo editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('mensaje', "Artículo eliminado correctamente");
    }

    private function rules(?int $id = null) : array {
        return [
            'nombre' => ['required', 'string', 'min:3', 'max:100', 'unique:articles,nombre,'.$id],
            'descripcion' => ['required', 'string', 'min:3', 'max:250'],
            'category_id' => ['required', 'exists:categories,id'],
            'disponible' => ['required', 'in:SI,NO'],
        ];
    }
}
