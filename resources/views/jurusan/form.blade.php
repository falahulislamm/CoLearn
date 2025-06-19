<x-layout>
<x-slot name="title">Pengaturan</x-slot> 
<x-slot name="breadcrumb_active">Jurusan</x-slot>
<x-slot name="card_footer">@CoLearn</x-slot>
<form action="{{ route('jurusan.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="nama">Jurusan</label>
        <input type="text" name="nama" id="nama" value="{{ $jurusan->nama }}" class="form-control" required>
    </div>
    
    <input type="hidden" name="id" value="{{ $jurusan->id }}">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('jurusan.show') }}" class="btn btn-danger mr-2">Cancel</a>
</form>
</x-layout>