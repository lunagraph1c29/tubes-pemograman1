@extends('layouts.app')

@section('title', 'Tambah Materi')

@section('content')

<h3>Tambah Materi</h3>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('materi.store') }}" method="POST">
    @csrf

    <input name="judul" value="{{ old('judul') }}" placeholder="Judul"><br><br>
    <input name="kategori" value="{{ old('kategori') }}" placeholder="Kategori"><br><br>
    <textarea name="deskripsi">{{ old('deskripsi') }}</textarea><br><br>

    <select name="status">
        <option value="belum">Belum</option>
        <option value="berjalan">Berjalan</option>
        <option value="selesai">Selesai</option>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>

@endsection
