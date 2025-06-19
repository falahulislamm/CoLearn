<x-layout>
<x-slot name="title">Pengaturan</x-slot> 
<x-slot name="breadcrumb_active">Comment</x-slot>
<x-slot name="card_footer">@CoLearn</x-slot>
<form action="{{ route('comment.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="diskusi_id">Judul Diskusi</label>
        <div class="row container">
        <select name="diskusi_id" class="form-select form-select-lg">
            <option>--Pilih--</option>
            @foreach($list_diskusi as $diskusi)
            <option value="{{ $diskusi->id }}" {{ $comment->diskusi_id==$diskusi->id ? 'selected': ''}}>
                {{ $diskusi->title }}
            </option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group">
        <label for="konten">Comment</label>
        <input type="textarea" name="konten" id="konten" value="{{ $comment->konten }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="user_id">Dibuat Oleh</label>
        <div class="row container">
        <select name="user_id" class="form-select form-select-lg">
            <option>--Pilih--</option>
            @foreach($list_pengguna as $pengguna)
            <option value="{{ $pengguna->id }}" {{ $comment->user_id==$pengguna->id ? 'selected': ''}}>
                {{ $pengguna->nama }}
            </option>
            @endforeach
        </select>
        </div>
    </div>
    
    <input type="hidden" name="id" value="{{ $comment->id }}">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('comment.show') }}" class="btn btn-danger mr-2">Cancel</a>
</form>
</x-layout>