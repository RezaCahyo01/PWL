<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//tambahan
use DB;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_anggota = DB::table('anggota')->get();
        return view('anggota.index',compact('ar_anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //arahkan ke form input
        return view('anggota.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //upload file
        if(!empty($request->foto)){
            $request->validate(
                ['foto'=>'image|mimes:png,jpg|max:2048']
            );
            $filename = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$filename);
        }else{
            $filename = '';
        }

        //menyimpan data
        DB::table('anggota')->insert(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'hp'=>$request->hp,
                // 'foto'=>$request->foto,
                'foto'=>$filename
            ]
        );
        return redirect('/anggota'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //tampilan detail
        $ar_anggota = DB::table('anggota')->where('id',$id)->get();
        return view('anggota.show',compact('ar_anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengarahkan ke form edit
        $data = DB::table('anggota')->where('id',$id)->get();
        return view('anggota.form_edit',compact('data'));
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
         //upload file
         if(!empty($request->foto)){
            $request->validate(
                ['foto'=>'image|mimes:png,jpg|max:2048']
            );
            $filename = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$filename);
        }else{
            $filename = '';
        }
        //update data
        DB::table('anggota')->where('id',$id)->update(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'hp'=>$request->hp,
                'foto'=>$filename,
            ]
        );
        return redirect('/anggota'.'/'.$id);     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus data
        DB::table('anggota')->where('id',$id)->delete();
        return redirect('/anggota');
    }
}
