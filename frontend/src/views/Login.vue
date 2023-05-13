<template>
  <div class="w-[320px] pt-40 text-green-900 mx-auto">
    <h3 class="text-xl font-semibold text-center mb-10">Login</h3>

    <form @submit.prevent="login">
      <div class="flex items-center justify-between">
        <label class="mr-4 text-lg">Email</label>
        <input
          type="email"
          v-model="formData.email"
          class="p-1 border text-lg"
        />
      </div>
      <div class="flex items-center justify-between mt-6">
        <label class="mr-4 text-lg">Password</label>
        <input
          type="password"
          v-model="formData.password"
          class="p-1 border text-lg"
        />
      </div>
      <button
        type="submit"
        class="mt-6 flex mx-auto px-4 py-1 bg-lime-400 text-white rounded text-lg"
      >
        Login
      </button>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axiosClient from "../axios";
import { useAuthStore } from "../store/auth";
import { storeToRefs } from "pinia";
import { useRouter } from "vue-router";

import ability from "../services/ability.js";

const authStore = useAuthStore();
const { user } = storeToRefs(authStore);
const router = useRouter();

const formData = ref({
  email: "superuser@example.com",
  password: "123qwe123",
});

function login() {
  authStore.login(formData.value).then((res) => {
    if (res) {
      console.log(res)
      // const roles = [{
      //     action: "read",
      //     subject: "Post",
      //   }]
      _handleRules(res.scopes)
      ability.update(res.scopes); //
      router.push({ name: "app.dashboard" });
    }
  });
}

function _handleRules(roles1){
  sessionStorage.setItem('ROLES', JSON.stringify(roles1))
}
const roles = [{
          action: "read",
          subject: "Post",
        }]
// import {ability} from './ability.js'
// router.beforeEach(async (to, from, next)=>{
//   ...
//   let rules = combileRulesOf(roles);
//   ability.update(rules);
//   // it works.
// }))
</script>

