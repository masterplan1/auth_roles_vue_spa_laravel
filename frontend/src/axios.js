import axios from "axios";
import router from './router';
import { useAuthStore } from "./store/auth";


const axiosClient = axios.create({
  baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`
})

axiosClient.interceptors.request.use(config => {
  
  config.headers.Authorization = `Bearer ${useAuthStore().user.token}`;
  return config;
})

axiosClient.interceptors.response.use(
  response => response, 
  error => {
    if(error.response.status === 401){
      sessionStorage.removeItem('TOKEN')
      sessionStorage.removeItem('ROLES')
      router.push({name: 'login'})
    }
  }
)

export default axiosClient;