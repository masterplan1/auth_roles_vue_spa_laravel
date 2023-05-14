<template>
  <div>
    <table class="table-auto w-full">
      <thead>
        <tr class="border-b-2 p-2 text-left cursor-pointer bg-gray-100">
          <th>Id</th>
          <th>Name</th>
          <th>Permissions</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="role in roles" :key="role.id">
          <td class="border-b border-gray-400 p-2">{{ role.id }}</td>
          <td class="border-b border-gray-400 p-2">{{ role.name }}</td>
          <td class="border-b border-gray-400 p-2 max-w-[200px]">
            <!-- <ul> -->
              <span 
                v-for="permission in role.permissions" 
                :key="permission.id"
                class="font-semibold my-1 px-2 bg-green-50 rounded-full mr-2 inline-block"
              >{{ permission.name }}</span>
            <!-- </ul> -->
          </td>
          <td class="border-b border-gray-400 p-2">
            <div class="flex gap-2">
              <span
                class="bg-yellow-400 text-white p-1 rounded-lg cursor-pointer hover:scale-105"
              >
              <router-link
                  :to="{ name: 'app.role-edit', params: { id: role.id } }"
                >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                  />
                </svg>
                </router-link>
              </span>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axiosClient from "../../axios";
// import { useRoleStore } from "../../store/role";
// import { storeToRefs } from "pinia";

// const store = useRoleStore();
// const { roles } = storeToRefs(store);
const roles = ref([])

onMounted(() => {
  axiosClient.get('/roles')
    .then(({data}) => {
      roles.value = data.data
    })
});
</script>