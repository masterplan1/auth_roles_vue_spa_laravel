<template>
  <div>
    Create New Post
    <form @submit.prevent="createPost">
      <div class="flex gap-4 mb-4 items-center">
        <label for="">Title</label>
        <input type="text" class="p-2 text-lg" v-model="formData.title">
      </div>
      <div class="flex gap-4 mb-4 items-center">
        <label for="">Text</label>
        <input type="text" class="p-2 text-lg" v-model="formData.text">
      </div>
      <button class="px-3 py-1 rounded text-white bg-emerald-400 font-semibold">Crate</button>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRoute, useRouter } from "vue-router";
import axiosClient from "../../axios";

const router = useRouter()

const formData = ref({
  title: '',
  text: ''
})

function createPost() {
  axiosClient.post("/posts/", formData.value).then(({ data }) => {
    router.push({name: 'app.post'})
  });
}

const route = useRoute();

</script>