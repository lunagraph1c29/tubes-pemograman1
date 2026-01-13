@extends('layouts.app')

@section('title', 'Daftar Materi')

@section('content')
<h3>Daftar Materi</h3>

{{-- FLASH MESSAGE --}}
@if (session('success'))
    <div style="color: green; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif

<a href="/materi/create">+ Tambah Materi</a>

<form method="GET" action="/materi" class="mt-4 mb-2">
    <input 
        type="text" 
        name="search" 
        value="{{ request('search') }}" 
        placeholder="Cari judul..."
    >
    <button type="submit">Cari</button>
</form>

<hr>

{{-- DATA MATERI --}}
@if ($materis->count() > 0)
<ul class="mt-4">
@foreach ($materis as $materi)
    <li style="margin-bottom:10px;">
        <b>{{ $materi->judul }}</b> ({{ $materi->status }})<br>

        <a href="/materi/{{ $materi->id }}/edit">Edit</a>

        <form 
            action="/materi/{{ $materi->id }}" 
            method="POST" 
            style="display:inline"
            onsubmit="return confirm('Yakin hapus materi ini?')"
        >
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </li>
@endforeach
</ul>

{{ $materis->withQueryString()->links() }}

@else
    <p><i>Belum ada materi. Silakan tambah materi pertama.</i></p>
@endif

@endsection
