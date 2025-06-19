<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Diskusi;

class DiskusiController extends Controller
{
    public function show(){
        $list_diskusi = Diskusi::all();
        return view('diskusi.show',['list_diskusi'=>$list_diskusi]);
    }

    public function create()
    {
        $diskusi = new Diskusi();
        return view('diskusi.form',['diskusi'=>$diskusi]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'title' => 'required',
            'konten' => 'required',
        ]);

        if($request->id){  
            Diskusi::find($request->id)->update($request->all());
            // Redirect to the index page with a success message
            return redirect(route('diskusi.show'))->with('pesan', 'Data berhasil diupdate');
        }
        else{
            // Create a new produk instance with the validated data
            Diskusi::create($request->all());
            // Redirect to the index page with a success message
            return redirect(route('diskusi.show'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $diskusi = Diskusi::find($id);
        return view('diskusi.form',['diskusi'=>$diskusi]);
    }

    public function view($id)
    {
        $diskusi = Diskusi::find($id);

        if (!$diskusi) {
            return response()->json(['error' => 'diskusi not found'], 404);
        }

        return response()->json($diskusi);
    }


    public function destroy($id): RedirectResponse
    {
        diskusi::find($id)->delete();
        return redirect(route('diskusi.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
            $list_diskusi = diskusi::with('user')
            ->where(function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->orWhere('title', 'like', "%$search%")
                ->orWhere('konten', 'like', "%$search%");
            })
            ->get();

        return view('diskusi.show', compact('list_diskusi'));
    }
}
