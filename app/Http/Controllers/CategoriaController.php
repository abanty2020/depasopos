<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    // FUNCIONES ESTÁTICAS PARA PAGINACIONES  
    public static function getPagination($paginaActual, $tamaño)
    {
        $limite = $tamaño ? $tamaño:3;
        $offset = $paginaActual ? $paginaActual * $limite : 0;

        return (array) [$limite, $offset];
    }
   
    public static function getinfoPagination($datos, $pagina, $limite)
    {
        list('count' => $totalFilas, 'rows' => $filas) = $datos;
        $paginaActual = $pagina ? $pagina : 0;
        $totalPaginas = ceil($totalFilas / $limite);
        return (array) ['filas' => $filas, 'paginaActual' => $paginaActual, 
        'totalFilas' => $totalFilas, 'totalPaginas' => $totalPaginas];
    }

    public function listPagination(Request $request)
    {
        $paginaActual = $request->paginaActual;
        $tamañoPorPagina = $request->tamañoPorPagina;
        // $tamañoPorPagina = 6;
        // $paginaActual = 1;

        list($limite, $offset) = self::getPagination($paginaActual, $tamañoPorPagina);

        $categorias = Categoria::where('condicion', 1)
        ->orderBy('id', 'asc')
        ->limit($limite)
        ->offset($offset)
        ->get();

        $count_categorias = Categoria::count();
    
        $reg = array('rows' => $categorias,'count' => $count_categorias);

        $response = self::getinfoPagination($reg, $paginaActual, $limite);

        return $response;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return $categorias;
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion = '1';
        $categoria->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $categoria = Categoria::findOrFail($request->id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion = '1';
        $categoria->save();
    }

    public function desactivar(Request $request)
    {
        $categoria = Categoria::findOrFail($request->id);
        $categoria->condicion = '0';
        $categoria->save();
    }

    public function activar(Request $request)
    {
        $categoria = Categoria::findOrFail($request->id);
        $categoria->condicion = '1';
        $categoria->save();
    }
    
}
