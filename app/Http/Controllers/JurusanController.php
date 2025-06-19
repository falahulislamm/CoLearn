<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function show(){
        $list_jurusan = Jurusan::all();
        return view('jurusan.show',['list_jurusan'=>$list_jurusan]);
    }

    public function create()
    {
        $jurusan = new Jurusan();
        return view('jurusan.form',['jurusan'=>$jurusan]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'nama' => 'required',
        ]);

        if($request->id){  
            Jurusan::find($request->id)->update($request->all());
            // Redirect to the index page with a success message
            return redirect(route('jurusan.show'))->with('pesan', 'Data berhasil diupdate');
        }
        else{
            // Create a new produk instance with the validated data
            Jurusan::create($request->all());
            // Redirect to the index page with a success message
            return redirect(route('jurusan.show'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        return view('jurusan.form',['jurusan'=>$jurusan]);
    }

    public function view($id)
    {
        $jurusan = Jurusan::find($id);

        if (!$jurusan) {
            return response()->json(['error' => 'jurusan not found'], 404);
        }

        return response()->json($jurusan);
    }


    public function destroy($id): RedirectResponse
    {
        Jurusan::find($id)->delete();
        return redirect(route('jurusan.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
            $list_jurusan = Jurusan::with('user')
            ->where(function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->orWhere('nama', 'like', "%$search%");
            })
            ->get();

        return view('jurusan.show', compact('list_jurusan'));
    }
}
