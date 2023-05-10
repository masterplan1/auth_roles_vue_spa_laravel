<template>
  <div>
    User #{{ route.params.id }}
    {{ user }}
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