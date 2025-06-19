<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Admin;

class AdminController extends Controller
{
    public function show(){
        $list_admin = Admin::all();
        return view('admin.show',['list_admin'=>$list_admin]);
    }

    public function create()
    {
        $admin = new Admin();
        return view('admin.form',['admin'=>$admin]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'telp' => 'required',
        ]);

        if($request->id){  
            Admin::find($request->id)->update($request->all());
            // Redirect to the index page with a success message
            return redirect(route('admin.show'))->with('pesan', 'Data berhasil diupdate');
        }
        else{
            // Create a new produk instance with the validated data
            Admin::create($request->all());
            // Redirect to the index page with a success message
            return redirect(route('admin.show'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.form',['admin'=>$admin]);
    }

    public function view($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['error' => 'admin not found'], 404);
        }

        return response()->json($admin);
    }


    public function destroy($id): RedirectResponse
    {
        Admin::find($id)->delete();
        return redirect(route('admin.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
            $list_admin = Admin::with('user')
            ->where(function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->orWhere('nama', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('telp', 'like', "%$search%");
            })
            ->get();

        return view('admin.show', compact('list_admin'));
    }
}
