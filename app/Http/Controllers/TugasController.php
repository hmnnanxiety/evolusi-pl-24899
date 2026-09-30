<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TugasController extends Controller
{
    public function index(): View
    {
        $tugas = Tugas::latest()->get();

        return view('tugas.index', compact('tugas'));
    }

    public function create(): View
    {
        return view('tugas.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $data['selesai'] = $request->boolean('selesai');

        Tugas::create($data);

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function edit(Tugas $tuga): View
    {
        return view('tugas.edit', ['tugas' => $tuga]);
    }

    public function update(Request $request, Tugas $tuga): RedirectResponse
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $data['selesai'] = $request->boolean('selesai');

        $tuga->update($data);

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy(Tugas $tuga): RedirectResponse
    {
        $tuga->delete();

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil dihapus.');
    }
}