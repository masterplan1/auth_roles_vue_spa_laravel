<template>
  <header class="flex p-3 justify-between items-center h-14 bg-white shadow">
    <div class="relative flex items-center justify-end text-left h-full w-full">
   
      <div class="flex gap-3 items-center">
        <h3 class="font-semibold">{{ store.user.data.email }},</h3>
        <button class="bg-emerald-50 rounded px-3 py-1" @click="logout">Logout</button>
      </div>
    </div>
  </header>
</template>

<script setup>
import {useAuthStore} from '../store/auth'
import { useRouter } from 'vue-router';
import { onMounted } from 'vue';

const store = useAuthStore();
const router = useRouter()

function logout(){
  store.logout()
    .then(() => {
      sessionStorage.removeItem('ROLES')
      router.push({name: 'login'})
    })
}

onMounted(() => {
  store.getUser()
})

</script>