import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import axiosClient from '../axios'

export const usePostStore = defineStore('post', () => {
  const posts = ref({})
  function getPosts() {
    return axiosClient.get('/posts')
      .then(({data}) => posts.value = data)
  }

  return { posts, getPosts }
})
