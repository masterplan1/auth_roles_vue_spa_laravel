<template>
  <div
    class="w-[200px] transition-all bg-indigo-700 text-white py-4 px-2 min-h-full"
  >
    <router-link
      :to="{ name: 'app.dashboard' }"
      class="flex text-white items-center hover:bg-black/30 transition-colors p-2 rounded mb-2"
      active-class="bg-gray-100 text-gray-800"
    >
      <span class="mr-2">
        <HomeIcon class="w-5" />
      </span>
      <span class="text-md font-semibold">Dashboard</span>
    </router-link>
    <router-link
      v-if="can('view', 'articles')"
      :to="{ name: 'app.post' }"
      class="flex text-white items-center hover:bg-black/30 transition-colors p-2 rounded mb-2"
      active-class="bg-gray-100 text-gray-800"
    >
      <span class="mr-2">
        <DocumentIcon class="w-5" />
      </span>
      <span class="text-md font-semibold">Posts</span>
    </router-link>
    <router-link
      v-if="can('view', 'users_list')"
      :to="{ name: 'app.user' }"
      class="flex text-white items-center hover:bg-black/30 transition-colors p-2 rounded mb-2"
      active-class="bg-gray-100 text-gray-800"
    >
      <span class="mr-2">
        <UserIcon class="w-5" />
      </span>
      <span class="text-md font-semibold">Users</span>
    </router-link>
    <router-link
      v-if="can('view', 'roles')"
      :to="{ name: 'app.role' }"
      class="flex text-white items-center hover:bg-black/30 transition-colors p-2 rounded"
      active-class="bg-gray-100 text-gray-800"
    >
      <span class="mr-2">
        <UserPlusIcon class="w-5" />
      </span>
      <span class="text-md font-semibold">Roles</span>
    </router-link>
  </div>
</template>
 
 <script setup>
import {
  HomeIcon,
  UserIcon,
  DocumentIcon,
  UserPlusIcon,
} from "@heroicons/vue/20/solid";
import { useAbility } from '@casl/vue';
const { can } = useAbility();
</script>