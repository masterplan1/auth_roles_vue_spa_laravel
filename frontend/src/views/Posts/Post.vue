<template>
  <div>
    <h3 class="mb-6 text-2xl p-4">Posts</h3>
    <p class="flex items-center justify-end gap-4 mb-6" v-if="can('create', 'articles')">
      <span>Create new Post</span> 
      <router-link :to="{name: 'app.post-create'}" class="bg-emerald-400 text-white p-1 rounded-lg cursor-pointer hover:scale-105">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </router-link>
    </p>
    <PostTable />
  </div>
</template>

<script setup>
import PostTable from './PostTable.vue';
import { useAbility } from '@casl/vue';
const { can } = useAbility();

</script>