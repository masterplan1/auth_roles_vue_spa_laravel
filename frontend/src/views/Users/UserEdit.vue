<template>
  <div>
    User #{{ route.params.id }}
    <form @submit.prevent="editUser">
      <div class="flex gap-4 mb-4 items-center">
        <label for="">Title</label>
        <input type="text" class="p-2 text-lg" v-model="formData.name" />
      </div>
      <div class="flex gap-4 mb-4 items-center">
        <label for="">Text</label>
        <input type="text" class="p-2 text-lg" v-model="formData.email" />
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
        Update
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
  roles: [],
});

function editUser() {
  axiosClient
    .put("/users/" + route.params.id, formData.value)
    .then(({ data }) => {
      router.push({ name: "app.user" });
    });
}

function rolesArrayHandler(arr) {
  return arr?.join(", ");
}

onMounted(() => {
  axiosClient.get("/users/" + route.params.id).then(({ data }) => {
    formData.value.name = data.name;
    formData.value.email = data.email;
    formData.value.roles = [...data.roles];
    roles.value = data.allRoles;
  });
});
</script>