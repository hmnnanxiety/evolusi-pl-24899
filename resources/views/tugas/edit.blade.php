<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Tugas</title>
</head>
<body>
    <h1>Edit Tugas</h1>

    <form method="POST" action="{{ route('tugas.update', $tugas) }}">
        @csrf
        @method('PUT')

        <p>
            <label>Judul</label><br>
            <input type="text" name="judul" value="{{ old('judul', $tugas->judul) }}" required>
        </p>

        <p>
            <label>Deskripsi</label><br>
            <textarea name="deskripsi">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
        </p>

        <p>
            <label>
                <input type="checkbox" name="selesai" value="1" {{ $tugas->selesai ? 'checked' : '' }}>
                Selesai
            </label>
        </p>

        <button type="submit">Update</button>
        <a href="{{ route('tugas.index') }}">Kembali</a>
    </form>
</body>
</html>
