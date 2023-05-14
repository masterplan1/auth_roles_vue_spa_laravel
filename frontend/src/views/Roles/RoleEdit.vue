<template>
  <div>
   <h3 class="text-2xl font-semibold mb-10 text-center">Role <span class="italic">{{ role.name }}</span></h3>
    <form @submit.prevent="editUser">
      <div class="mb-8 flex gap-8">
        <h3 class="text-lg font-semibold">Permissions:</h3>
        <div class="flex justify-start flex-wrap bg-white rounded px-4">
          <div v-for="permission in role.allPermissions" :key="permission.id" class="flex mr-4 items-center">
            <label class="mr-2 text-lg font-semibold" :for="permission.name">{{ permission.name }}</label>
            <input
              :id="permission.name"
              type="checkbox"
              v-model="formPermissions"
              :value="permission.name"
            />
          </div>
        </div>
      </div>
      <button class="px-3 py-1 rounded text-white bg-emerald-400 font-semibold mx-auto block">
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