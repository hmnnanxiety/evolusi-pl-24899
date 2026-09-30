<?php

namespace Tests\Feature;

use App\Models\Tugas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TugasCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_tugas_can_be_created(): void
    {
        $response = $this->post('/tugas', [
            'judul' => 'Belajar CI/CD',
            'deskripsi' => 'Mengerjakan praktikum deployment Laravel',
        ]);

        $response->assertRedirect('/tugas');

        $this->assertDatabaseHas('tugas', [
            'judul' => 'Belajar CI/CD',
        ]);
    }

    public function test_tugas_can_be_updated(): void
    {
        $tugas = Tugas::create([
            'judul' => 'Judul Lama',
            'deskripsi' => 'Deskripsi lama',
        ]);

        $response = $this->put("/tugas/{$tugas->id}", [
            'judul' => 'Judul Baru',
            'deskripsi' => 'Deskripsi baru',
            'selesai' => '1',
        ]);

        $response->assertRedirect('/tugas');

        $this->assertDatabaseHas('tugas', [
            'id' => $tugas->id,
            'judul' => 'Judul Baru',
            'selesai' => true,
        ]);
    }

    public function test_tugas_can_be_deleted(): void
    {
        $tugas = Tugas::create([
            'judul' => 'Tugas yang dihapus',
        ]);

        $response = $this->delete("/tugas/{$tugas->id}");

        $response->assertRedirect('/tugas');

        $this->assertDatabaseMissing('tugas', [
            'id' => $tugas->id,
        ]);
    }
}
