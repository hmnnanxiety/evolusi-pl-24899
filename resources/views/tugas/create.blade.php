<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tugas</title>
</head>
<body>
    <h1>Tambah Tugas</h1>

    <form method="POST" action="{{ route('tugas.store') }}">
        @csrf

        <p>
            <label>Judul</label><br>
            <input type="text" name="judul" value="{{ old('judul') }}" required>
        </p>

        <p>
            <label>Deskripsi</label><br>
            <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>
        </p>

        <p>
            <label>
                <input type="checkbox" name="selesai" value="1">
                Selesai
            </label>
        </p>

        <button type="submit">Simpan</button>
        <a href="{{ route('tugas.index') }}">Kembali</a>
    </form>
</body>
</html>
