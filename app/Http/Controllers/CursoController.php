<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cursos = Curso::select( ['id', 'titulo', 'precio', 'imagen'] )
            ->where('visible', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('cursos.index', [
            'titulo' => 'Lista de cursos',
            'cursos' => $cursos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required|max:100',
            'descripcion' => 'required',
            'precio' => 'numeric|max:1000000',
            'imagen' => 'nullable|file|mimes:jpg,jpeg,png'
        ]);

        $imagen = null;

        if( $request->hasFile('imagen') ){
            //Verificamos si el archivo existe.
            //Nombre del archivo cómo lo subió el usuario.
            $imagen_nombre = $request->file('imagen')->getClientOriginalName();
            //Path del archivo cómo se va a guardar en la base de datos.
            $imagen = $request->file('imagen')->storeAs('cursos', (time() . $imagen_nombre), 'public');
        }

        Curso::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $imagen
        ]);

        return redirect()
            ->route('cursos.index')
            ->with('status', 'El curso se ha creado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        return $curso;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        return view('cursos.edit', [
            'curso' => $curso
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {

        $request->validate([
            'titulo' => 'required|max:100',
            'descripcion' => 'required',
            'precio' => 'numeric|max:1000000'
        ]);

        $curso->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio
        ]);
        return redirect()
            ->route('cursos.index')
            ->with('status', 'El curso se ha modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //$curso->delete();
        $curso->update([
            'visible' => false
        ]);
        return redirect()
            ->route('cursos.index')
            ->with('status', 'El curso se ha eliminado correctamente.');
    }
}
