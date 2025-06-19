<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Peminatan;
use App\Models\Jurusan;

class PeminatanController extends Controller
{
    public function show(){
        $list_peminatan = Peminatan::all();
        return view('peminatan.show', ['list_peminatan'=>$list_peminatan]);
    }


    public function create()
    {
        $list_jurusan = Jurusan::all();
        $peminatan = new Peminatan();
        return view('peminatan.form',['list_jurusan'=>$list_jurusan, 'peminatan'=>$peminatan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'nama' => 'required',
            'jurusan_id' => 'required',
        ]);

        if($request->id){  
            Peminatan::find($request->id)->update($request->all());
            // Redirect to the index page with a success message
            return redirect(route('peminatan.show'))->with('pesan', 'Data berhasil diupdate');
        }
        else{
            // Create a new produk instance with the validated data
            Peminatan::create($request->all());
            // Redirect to the index page with a success message
            return redirect(route('peminatan.show'))->with('pesan', 'Data berhasil disimpan');
        }  
    }

    public function edit($id)
    {
        $peminatan = Peminatan::find($id);
        $list_jurusan = Jurusan::all();
        return view('peminatan.form',['list_jurusan'=>$list_jurusan,'peminatan'=>$peminatan]);
    }

    public function view($id)
    {
        $peminatan = Peminatan::with('jurusan')->find($id);

        if (!$peminatan) {
            return response()->json(['error' => 'providers services not found'], 404);
        }

        return response()->json($peminatan);
    }


    public function destroy($id): RedirectResponse
    {
        Peminatan::find($id)->delete();
        return redirect(route('peminatan.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $list_peminatan = Peminatan::with('jurusan')
        ->where(function ($query) use ($search) {
            $query->whereHas('jurusan', function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            })
            ->orWhere('nama', 'like', "%$search%");
        })
        ->get();

        return view('peminatan.show', compact('list_peminatan'));
    }
}
