import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import axiosClient from '../axios'

export const useUserStore = defineStore('user', () => {
  const users = ref({})
  function getUsers() {
    return axiosClient.get('/users')
      .then(({data}) => users.value = data.data)
  }

  return { users, getUsers }
})
