<template>
  <div class="flex min-h-full bg-gray-200">
    <Sidebar />
    <div class="flex-1">
      <Navbar />
      <main class="p-6">
        <router-view></router-view>
      </main>
    </div>
  </div>
</template>

<script setup>
import Sidebar from './Sidebar.vue';
import Navbar from './Navbar.vue';
</script>