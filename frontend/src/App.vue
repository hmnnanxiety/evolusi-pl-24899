<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <nav>
      <RouterLink to="/">Home</RouterLink>
      <RouterLink to="/tugas">Tugas</RouterLink>
    </nav>
  </header>

  <RouterView />
</template>

<style scoped>
header {
  padding: 20px;
  text-align: center;
}

nav {
  display: flex;
  justify-content: center;
  gap: 20px;
}

a {
  text-decoration: none;
  font-weight: bold;
}
</style>