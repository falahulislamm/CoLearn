<x-layout>
<x-slot name="title">Pengaturan</x-slot> 
<x-slot name="breadcrumb_active">Admin</x-slot>
<x-slot name="card_footer">@CoLearn</x-slot>
<form action="{{ route('admin.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ $admin->nama }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $admin->email }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="telp">No Telp</label>
        <input type="number" name="telp" id="telp" value="{{ $admin->telp }}" class="form-control" required>
    </div>
    
    <input type="hidden" name="id" value="{{ $admin->id }}">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('admin.show') }}" class="btn btn-danger mr-2">Cancel</a>
</form>
</x-layout>