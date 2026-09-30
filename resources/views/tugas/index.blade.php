<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f4f6f8; margin:0; padding:40px; color:#1f2937; }
        .container { max-width:900px; margin:auto; background:white; padding:32px; border-radius:16px; }
        table { width:100%; border-collapse:collapse; margin-top:20px; }
        th, td { padding:12px; border-bottom:1px solid #ddd; text-align:left; }
        a, button { padding:8px 12px; border-radius:8px; text-decoration:none; border:0; cursor:pointer; }
        .primary { background:#4f46e5; color:white; }
        .danger { background:#dc2626; color:white; }
        .edit { background:#f59e0b; color:white; }
        form { display:inline; }
    </style>
</head>
<body>
<div class="container">
    <h1>Daftar Tugas</h1>

    <a href="{{ route('tugas.create') }}" class="primary">Tambah Tugas</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tugas as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->selesai ? 'Selesai' : 'Belum selesai' }}</td>
                <td>
                    <a class="edit" href="{{ route('tugas.edit', $item) }}">Edit</a>

                    <form method="POST" action="{{ route('tugas.destroy', $item) }}">
                        @csrf
                        @method('DELETE')
                        <button class="danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Belum ada tugas.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
