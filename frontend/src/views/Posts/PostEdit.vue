<template>
  <div>
    Post #{{ route.params.id }}
    <form @submit.prevent="editPost">
      <div class="flex gap-4 mb-4 items-center">
        <label for="">Title</label>
        <input type="text" class="p-2 text-lg" v-model="formData.title">
      </div>
      <div class="flex gap-4 mb-4 items-center">
        <label for="">Text</label>
        <input type="text" class="p-2 text-lg" v-model="formData.text">
      </div>
      <button class="px-3 py-1 rounded text-white bg-emerald-400 font-semibold">Update</button>
    </form>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useRoute, useRouter } from "vue-router";
import axiosClient from "../../axios";

const router = useRouter()

const formData = ref({
  title: '',
  text: ''
})
const post = ({})

function editPost(id) {
  axiosClient.put("/posts/" + post.value.id, formData.value).then(({ data }) => {
    router.push({name: 'app.post'})
  });
}

const route = useRoute();
onMounted(() => {
  axiosClient.get("/posts/" + route.params.id).then(({ data }) => {
    post.value = data
    formData.value.title = data.title
    formData.value.text = data.text
  });
});
</script>