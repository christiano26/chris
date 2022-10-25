<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Projek;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('admin.MasterProject', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projek = projek::all();
        $id_siswa = request()->query('siswa');
        $siswa = siswa::all();
        return view('admin.CreateProject',compact('siswa', 'id_siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required'=>':attribute minimal diisi dong kak',
            'min'=>':attribute minimal :min karakter lah ya',
            'max'=>':attribute maksimal :max karakter dong'
        ];

        $this->validate($request,[
            'nama_projek'=>'required|min:5|max:20', 
            'tanggal'=>'required',
            'deskripsi'=>'required',
            'foto'=>'required',
        ], $messages);

        // ambil informasi yang diiupload
        $file = $request->file('foto');

        // rename
        $nama_file = time()."_".$file->getClientOriginalName();

        // proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

          // proses insert Database 
          Projek::create([
            'siswa_id'=> $request->siswa_id,
            'nama_projek'=> $request->nama_projek, 
            'tanggal'=>$request->tanggal,
            'deskripsi'=>$request->deskripsi,
            'foto'=>$nama_file
        ]);

        return redirect('/masterproject');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
       $data=Siswa::find($id)->project()->get();
       return view('admin.ShowProject', compact('data'));
    }
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
        $projek = Projek::destroy($id);
        return redirect ('masterproject');
    }
}
