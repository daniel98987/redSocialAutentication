<?php

namespace App\Http\Controllers;

use App\Models\Amistades;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios =  User::all();
        return $usuarios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new User();
        $p->nickname = $request->nickname;
        $p->name =  ($request->name);
        $p->surnames = $request->surnames;
        $p->email = $request->email;
        $p->password = bcrypt($request->password);

        $result = $p->save();
        return response('Usuario creado',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user =  User::findOrFail($id);
        return  response($user) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $p = User::find($id);
        $p->nickname = $request->nickname;
        $p->name =  ($request->name);
        $p->surnames = $request->surnames;
        $result = $p->save();
        return response('Usuario editado ',201);
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
        //
    }

    public function indexAmistad()
    {
        $amistades =  Amistades::all();
        return $amistades;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAmistad()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAmistad(Request $request)
    {
        $p = new User();
        $p->nickname = $request->nickname;
        $p->name =  ($request->name);
        $p->surnames = $request->surnames;
        $p->email = $request->email;
        $p->password = bcrypt($request->password);

        $result = $p->save();
        return response('Usuario creado',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAmistad($id)
    {
        $amistad =  Amistades::findOrFail($id);
        return  response($amistad) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAmistad(Request $request,$id)
    {
        $p = Amistades::find($id);
        $p->rented = $request->rented;

        $result = $p->save();
        return response('Amistad editada ',201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAmistad(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from amistades where id = ?', [$id]);


       // notify()->success('Pelicula eliminada');
        return response('Amistad eliminada',201);
    }
}
