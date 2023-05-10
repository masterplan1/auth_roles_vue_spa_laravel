<template>
  <div>
    <h2 class="text-xl font-semibold mb-6">Post #{{ route.params.id }}</h2>
    <p class="text-lg">
      <span class="mr-4 font-semibold">Title: </span>
      <span>{{ post.title }}</span>
    </p>
    <p class="text-lg">
      <span class="mr-4 font-semibold">Text: </span>
      <span>{{ post.text }}</span>
    </p>
  </div>
</template>

<script setup>
  import { onMounted, ref } from 'vue';
  import { useRoute } from 'vue-router';
  import axiosClient from '../../axios';

  const route = useRoute()
  const post = ref({})
  onMounted(() => {
    axiosClient.get('/posts/' + route.params.id)
      .then(({data}) => {
        post.value = data
      })
  })

</script>