<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function show(){
        $list_pengguna = Pengguna::all();
        return view('pengguna.show',['list_pengguna'=>$list_pengguna]);
    }

    public function create()
    {
        $pengguna = new Pengguna();
        return view('pengguna.form',['pengguna'=>$pengguna]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'telp' => 'required',
        ]);

        if($request->id){  
            Pengguna::find($request->id)->update($request->all());
            // Redirect to the index page with a success message
            return redirect(route('pengguna.show'))->with('pesan', 'Data berhasil diupdate');
        }
        else{
            // Create a new produk instance with the validated data
            Pengguna::create($request->all());
            // Redirect to the index page with a success message
            return redirect(route('pengguna.show'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $pengguna = Pengguna::find($id);
        return view('pengguna.form',['pengguna'=>$pengguna]);
    }

    public function view($id)
    {
        $pengguna = Pengguna::find($id);

        if (!$pengguna) {
            return response()->json(['error' => 'pengguna not found'], 404);
        }

        return response()->json($pengguna);
    }


    public function destroy($id): RedirectResponse
    {
        Pengguna::find($id)->delete();
        return redirect(route('pengguna.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
            $list_pengguna = Pengguna::with('user')
            ->where(function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->orWhere('nama', 'like', "%$search%")
                ->orWhere('nim', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
            })
            ->get();

        return view('pengguna.show', compact('list_pengguna'));
    }
}
