<template>
  <div>
    <table class="table-auto w-full">
      <thead>
        <tr class="border-b-2 p-2 text-left cursor-pointer bg-gray-100">
          <th>Id</th>
          <th>Email</th>
          <th>Roles</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td class="border-b border-gray-400 p-2">{{ user.id }}</td>
          <td class="border-b border-gray-400 p-2">{{ user.email }}</td>
          <td class="border-b border-gray-400 p-2">{{ rolesArrayHandler(user.roles) }}</td>
          <td class="border-b border-gray-400 p-2">
            <div class="flex gap-2">
              <span v-if="can('view', 'user')"
                class="bg-blue-400 text-white p-1 rounded-lg cursor-pointer hover:scale-105"
              >
                <router-link
                  :to="{ name: 'app.user-view', params: { id: user.id } }"
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
                      d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                  </svg>
                </router-link>
              </span>
              <span
                v-if="can('edit', 'user')"
                class="bg-yellow-400 text-white p-1 rounded-lg cursor-pointer hover:scale-105"
              >
              <router-link
                  :to="{ name: 'app.user-edit', params: { id: user.id } }"
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
              <span
                v-if="can('delete', 'user')"
                class="bg-red-400 text-white p-1 rounded-lg cursor-pointer hover:scale-105"
                @click="removeUser(user.id)"
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
                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                  />
                </svg>
              </span>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { onMounted } from "vue";
import axiosClient from "../../axios";
import { useUserStore } from "../../store/user";
import { storeToRefs } from "pinia";
import { useAbility } from '@casl/vue';
const { can } = useAbility();

const store = useUserStore();
const { users } = storeToRefs(store);

function removeUser(id) {
  axiosClient.delete("/users/" + id).then(() => {
    store.getUsers();
  });
}

function rolesArrayHandler(arr){
  return arr.join(', ')
}

onMounted(() => {
  store.getUsers();
});
</script>