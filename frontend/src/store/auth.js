import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import axiosClient from '../axios'

export const useAuthStore = defineStore('auth', () => {

  const user = ref({
    data: {},
    token: sessionStorage.getItem('TOKEN')
  })
  const loading = ref(false)

  function login(formData) {
    return axiosClient.post('/login', formData)
    .then(({data}) => {
      user.value.data =  data.user
      setToken(data.token)
      return true
    })
    .catch(({response}) => {
      console.log(response.data)
      return false
    })
  }

  function setToken(token){
    user.value.token =  token
    if(token){
      sessionStorage.setItem('TOKEN', token)
    } else {
      sessionStorage.removeItem('TOKEN')
    }
  }
  
  function logout(){
    return axiosClient.post('/logout')
    .then((res) => {
      setToken(null)
      user.value.data = {}
      return res
    })
  }

  function getUser(){
    return axiosClient.get('/user')
      .then(({data}) => {
        user.value.data = data
      })
  }

  return { user, loading, login, logout, getUser }
})
