<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentoController extends Controller
{

    public function index()
    {
        return view('documento.index');
    }

    public function create()
    {
        return view('documento.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function show($id)
    {
        dd($id);
    }

    public function edit($id)
    {
        dd($id);
    }

    public function update(Request $request, $id)
    {
        dd($request, $id);
    }

    public function destroy($id)
    {
        dd($id);
    }
}
