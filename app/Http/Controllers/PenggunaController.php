<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Pengguna;
use App\Models\Jurusan;
use App\Models\Peminatan;

class PenggunaController extends Controller
{
    public function show(){
        $list_pengguna = Pengguna::all();
        return view('pengguna.show',['list_pengguna'=>$list_pengguna]);
    }

    public function create()
    {
        $list_jurusan = Jurusan::all();
        $list_peminatan = Peminatan::all();
        $pengguna = new Pengguna();
        return view('pengguna.form',['pengguna'=>$pengguna, 'list_jurusan'=>$list_jurusan, 'list_peminatan'=>$list_peminatan]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'jurusan_id' => 'required',
            'peminatan_id' => 'required',
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
        $list_jurusan = Jurusan::all();
        $list_peminatan = Peminatan::all();
        $pengguna = Pengguna::find($id);
        return view('pengguna.form',['pengguna'=>$pengguna, 'list_jurusan'=>$list_jurusan, 'list_peminatan'=>$list_peminatan]);
    }

    public function view($id)
    {
        $pengguna = Pengguna::with('jurusan', 'peminatan')->find($id);

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
            $list_pengguna = Pengguna::with('user', 'jurusan', 'peminatan')
            ->where(function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->orWhereHas('jurusan', function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
                })
                ->orWhereHas('peminatan', function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
                })
                ->orWhere('nama', 'like', "%$search%")
                ->orWhere('nim', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
            })
            ->get();

        return view('pengguna.show', compact('list_pengguna'));
    }
}
