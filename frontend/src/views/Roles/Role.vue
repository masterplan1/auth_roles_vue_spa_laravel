<template>
  <div>
    <h3 class="mb-6 text-2xl p-4">Roles</h3>
    <RoleTable />
  </div>
</template>

<script setup>
import RoleTable from './RolesTable.vue';
import { useAbility } from '@casl/vue';
const { can } = useAbility();

</script>