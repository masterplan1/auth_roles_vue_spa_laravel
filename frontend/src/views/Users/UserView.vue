<template>
  <div>
    <h2 class="text-xl font-semibold mb-6">User #{{ route.params.id }}</h2>
    <p class="text-lg">
      <span class="mr-4 font-semibold">Name: </span>
      <span>{{ user.name }}</span>
    </p>
    <p class="text-lg">
      <span class="mr-4 font-semibold">Email: </span>
      <span>{{ user.email }}</span>
    </p>
  </div>
</template>

<script setup>
  import { onMounted, ref } from 'vue';
  import { useRoute } from 'vue-router';
  import axiosClient from '../../axios';

  const route = useRoute()
  const user = ref({})
  onMounted(() => {
    axiosClient.get('/users/' + route.params.id)
      .then(({data}) => {
        user.value = data
      })
  })

</script>