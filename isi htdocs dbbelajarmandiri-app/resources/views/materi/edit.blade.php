<!DOCTYPE html>
<html>
<head>
    <title>Edit Materi</title>
</head>
<body>

<h1>Edit Materi</h1>

<form action="/materi/{{ $materi->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Judul</label><br>
    <input type="text" name="judul" value="{{ $materi->judul }}"><br><br>

    <label>Kategori</label><br>
    <input type="text" name="kategori" value="{{ $materi->kategori }}"><br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi">{{ $materi->deskripsi }}</textarea><br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="belum" {{ $materi->status=='belum'?'selected':'' }}>Belum</option>
        <option value="berjalan" {{ $materi->status=='berjalan'?'selected':'' }}>Berjalan</option>
        <option value="selesai" {{ $materi->status=='selesai'?'selected':'' }}>Selesai</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
