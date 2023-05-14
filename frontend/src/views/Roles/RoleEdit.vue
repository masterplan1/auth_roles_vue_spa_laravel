<template>
  <div>
    Role #{{ route.params.id }}
    <form @submit.prevent="editUser">
      <div class="flex gap-4 mb-4 items-center">
        <h3>Name: </h3>
        <p>{{ role.name }}</p>
      </div>
      <div class="mb-4 flex items-center gap-8">
        <h3>Permissions</h3>
        <div class="flex justify-start items-center gap-6">
          <div v-for="permission in role.allPermissions" :key="permission.id" class="flex items-center">
            <label class="mr-2 text-lg font-semibold">{{ permission.name }}</label>
            <input
              type="checkbox"
              v-model="formPermissions"
              :value="permission.name"
            />
          </div>
        </div>
      </div>
      <button class="px-3 py-1 rounded text-white bg-emerald-400 font-semibold">
        Update
      </button>
      {{ formPermissions}}
    </form>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useRoute, useRouter } from "vue-router";
import axiosClient from "../../axios";

const router = useRouter();
const route = useRoute();
let role = ref({});
const formPermissions = ref([])

function editUser() {
  axiosClient
    .put("/role/" + route.params.id, {permissions: formPermissions.value, role_name: role.value.name})
    .then(({ data }) => {
      // role.value = data
      // formPermissions.value = [...data.permissions];
      router.push({ name: "app.role" });
    });
}

onMounted(() => {
  axiosClient.get("/role/" + route.params.id).then(({ data }) => {
    role.value = data
    formPermissions.value = [...data.permissions];
  });
});
</script>