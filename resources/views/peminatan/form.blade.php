<x-layout>
<x-slot name="title">Pengaturan</x-slot> 
<x-slot name="breadcrumb_active">Peminatan</x-slot>
<x-slot name="card_footer">@CoLearn</x-slot>
<form action="{{ route('peminatan.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="nama">Peminatan</label>
        <input type="text" name="nama" id="nama" value="{{ $peminatan->nama }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="jurusan_id">Jurusan</label>
        <div class="row container">
        <select name="jurusan_id" class="form-select form-select-lg">
            <option>--Pilih Jurusan--</option>
            @foreach($list_jurusan as $jurusan)
            <option value="{{ $jurusan->id }}" {{ $peminatan->jurusan_id==$jurusan->id ? 'selected': ''}}>
                {{ $jurusan->nama }}
            </option>
            @endforeach
        </select>
        </div>
    </div>
    
    <input type="hidden" name="id" value="{{ $peminatan->id }}">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('peminatan.show') }}" class="btn btn-danger mr-2">Cancel</a>
</form>
</x-layout>