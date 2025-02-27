<?php

namespace App\Http\Controllers\core\learn;

use App\Http\Controllers\Controller;
use App\Models\core\learn\MateriPembelajaran;
use Illuminate\Http\Request;

class MateriPembelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // $materi = MateriPembelajaran::paginate(9);
        $limit = 6;
        $materi = MateriPembelajaran::select('id', 'title')
        ->limit($limit)
        ->get();
        
        if($request->exists('page')) {
            $page = $request->input('page');
            $materi = MateriPembelajaran::select('id', 'title')
            ->limit(6)
            ->skip($page*$limit)
            ->get();
        }
        

        $materi_count = MateriPembelajaran::count();

        if($request->exists('cat_id')){
            $materi = MateriPembelajaran::where('category_pembelajaran_id', $request->input('cat_id'))
            ->select('id', 'title')
            ->get();

            $materi_count = MateriPembelajaran::where('category_pembelajaran_id', $request->input('cat_id'))->count();
        }

        return response()->json([
            'data' => [
                'materi_count' => $materi_count,
                'materis' => $materi
            ]
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
