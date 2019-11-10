<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::orderBy(id, 'DESC')->paginate(3);
        return view('Libro.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Libro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nombre'=>'required',
                'resumen'=>'required',
                'paginas'=>'required',
                'edicion'=>'required',
                'autor'=>'required',
                'precio'=>'required'
            ]
        );
        Libro::create($request->all());
        return redirect()
            ->route('Libro.index')
            ->with('succes', 'Registro creado satiscactoriamente');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::find($id);
        return view('Libro.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);
        return view('Libro.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'nombre'=>'required',
                'resumen'=>'required',
                'paginas'=>'required',
                'edicion'=>'required',
                'autor'=>'required',
                'precio'=>'required'
            ]
        );
        Libro::find($id)->update($request->all());
        return redirect()
            ->route('Libro.index')
            ->with('succes', 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Libro::find($id)->delete();
        return redirect()
            ->route('Libro.index')
            ->with('success','Registro eliminado satisfactoriamente');
    }
}
