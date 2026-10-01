<script setup>
import { onMounted, ref } from 'vue'
import { formatTaskStatus } from '../utils/taskStatus'

const tugas = ref([])
const loading = ref(true)
const error = ref('')

async function fetchTugas() {
  try {
    const response = await fetch(
      `${import.meta.env.VITE_API_URL}/api/tugas`
    )

    if (!response.ok) {
      throw new Error('Gagal mengambil data tugas')
    }

    tugas.value = await response.json()
  } catch (err) {
    error.value = err.message
  } finally {
    loading.value = false
  }
}

onMounted(fetchTugas)
</script>

<template>
  <main>
    <h1>Daftar Tugas Laravel</h1>

    <p v-if="loading">Memuat data...</p>
    <p v-else-if="error">{{ error }}</p>

    <div v-else>
      <p v-if="tugas.length === 0">
        Belum ada tugas.
      </p>

      <article
        v-for="item in tugas"
        :key="item.id"
        class="task-card"
      >
        <h2>{{ item.judul }}</h2>
        <p>{{ item.deskripsi }}</p>
        <strong>
          {{ formatTaskStatus(item.selesai) }}
        </strong>
      </article>
    </div>
  </main>
</template>

<style scoped>
main {
  max-width: 800px;
  margin: 40px auto;
  padding: 24px;
}

.task-card {
  margin: 16px 0;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 12px;
}
</style>