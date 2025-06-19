<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Comment;
use App\Models\Diskusi;
use App\Models\Pengguna;

class CommentController extends Controller
{
    public function show(){
        $list_comment = Comment::all();
        return view('comment.show',['list_comment'=>$list_comment]);
    }

    public function create()
    {
        $list_diskusi = Diskusi::all();
        $list_pengguna = Pengguna::all();
        $comment = new Comment();
        return view('comment.form',['comment'=>$comment, 'list_diskusi'=>$list_diskusi, 'list_pengguna'=>$list_pengguna]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'konten' => 'required',
            'diskusi_id' => 'required',
            'user_id' => 'required',
        ]);

        if($request->id){  
            Comment::find($request->id)->update($request->all());
            // Redirect to the index page with a success message
            return redirect(route('comment.show'))->with('pesan', 'Data berhasil diupdate');
        }
        else{
            // Create a new produk instance with the validated data
            Comment::create($request->all());
            // Redirect to the index page with a success message
            return redirect(route('comment.show'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $list_diskusi = Diskusi::all();
        $list_pengguna = Pengguna::all();
        $comment = Comment::find($id);
        return view('comment.form',['comment'=>$comment, 'list_diskusi'=>$list_diskusi, 'list_pengguna'=>$list_pengguna]);
    }

    public function view($id)
    {
        $comment = Comment::with('diskusi', 'pengguna')->find($id);

        if (!$comment) {
            return response()->json(['error' => 'comment not found'], 404);
        }

        return response()->json($comment);
    }


    public function destroy($id): RedirectResponse
    {
        Comment::find($id)->delete();
        return redirect(route('comment.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
            $list_comment = Comment::with('diskusi', 'pengguna')
            ->where(function ($query) use ($search) {
                $query->whereHas('diskusi', function ($query) use ($search) {
                    $query->where('title', 'like', "%$search%");
                })
                ->orWhereHas('pengguna', function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
                })
                ->orWhere('title', 'like', "%$search%")
                ->orWhere('konten', 'like', "%$search%");
            })
            ->get();

        return view('comment.show', compact('list_comment'));
    }
}
