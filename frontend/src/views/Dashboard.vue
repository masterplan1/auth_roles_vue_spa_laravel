<template>
  <div class="p-10">
    <h1 class="text-xl font-semibold mb-4">
      Wellcome to simple admin page with roles/permissions.
    </h1>
    <p class="text-lg">
      There is an example of Laravel back + vue spa authorization with roles using spatie laravel-permission and casl.
    </p>
  </div>
</template>

<script setup>
import { useAbility } from '@casl/vue';
const { can } = useAbility();
</script>