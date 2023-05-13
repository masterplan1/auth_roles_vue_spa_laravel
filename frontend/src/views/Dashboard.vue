<template>
  <div class="p-10">
    <p v-if="can('create', 'articles')">
      Dashboard
    </p>
    <p>
      Dashboard1
    </p>
    <router-link to="/post"><p
        class="mt-8 text-blue-400 text-xl"
      >Posts</p></router-link>
  </div>
</template>

<script setup>
import { useAbility } from '@casl/vue';
const { can } = useAbility();
</script>