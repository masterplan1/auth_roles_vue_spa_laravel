<template>
  <div>
    Create New User
    <form @submit.prevent="createUser">
      <div class="flex gap-4 mb-4 items-center">
        <label for="">Username</label>
        <input type="text" class="p-2 text-lg rounded" v-model="formData.name" />
      </div>
      <div class="flex gap-4 mb-4 items-center">
        <label for="">Email</label>
        <input type="text" class="p-2 text-lg rounded" v-model="formData.email" />
      </div>
      <div class="flex gap-4 mb-4 items-center">
        <label for="">Password</label>
        <input type="password" class="p-2 text-lg rounded" v-model="formData.password" />
      </div>
      <div class="mb-4 flex items-center gap-8">
        <h3>Roles</h3>
        <div class="flex justify-start items-center gap-6">
          <div v-for="role in roles" :key="role.id" class="flex items-center">
            <label class="mr-2 text-lg font-semibold">{{ role.name }}</label>
            <input
              type="checkbox"
              v-model="formData.roles"
              :value="role.name"
            />
          </div>
        </div>
      </div>
      <button class="px-3 py-1 rounded text-white bg-emerald-400 font-semibold">
        Create
      </button>
    </form>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useRoute, useRouter } from "vue-router";
import axiosClient from "../../axios";

const router = useRouter();
const route = useRoute();
let roles = ref([]);
const formData = ref({
  name: "",
  email: "",
  password: "",
  roles: [],
});

function createUser() {
  axiosClient
    .post("/users/create", formData.value)
    .then(({ data }) => {
      router.push({ name: "app.user" });
    });
}

onMounted(() => {
  axiosClient.get("/roles").then(({ data }) => {
    roles.value = data.data;
  });
});
</script>