<x-layout>
<x-slot name="title">Pengaturan</x-slot> 
<x-slot name="breadcrumb_active">Diskusi</x-slot>
<x-slot name="card_footer">@CoLearn</x-slot>
<form action="{{ route('diskusi.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $diskusi->title }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="konten">Deskripsi</label>
        <input type="textarea" name="konten" id="konten" value="{{ $diskusi->konten }}" class="form-control" required>
    </div>
    
    <input type="hidden" name="id" value="{{ $diskusi->id }}">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('diskusi.show') }}" class="btn btn-danger mr-2">Cancel</a>
</form>
</x-layout>