<template>
  <div class="w-[200px] transition-all bg-indigo-700 text-white py-4 px-2 min-h-full">
     <router-link :to="{name: 'app.dashboard'}" 
       class="flex items-center hover:bg-black/30 transition-colors p-2 rounded">
       <span class="mr-2">
         <HomeIcon class="w-5" />
       </span>
       <span class="text-sm text-gray-300">Dashboard</span>
     </router-link>
     <router-link :to="{name: 'app.post'}" 
       class="flex items-center hover:bg-black/30 transition-colors p-2 rounded">
       <span class="mr-2">
         <HomeIcon class="w-5" />
       </span>
       <span class="text-sm text-gray-300">Posts</span>
     </router-link>
     <router-link :to="{name: 'app.user'}" 
       class="flex items-center hover:bg-black/30 transition-colors p-2 rounded">
       <span class="mr-2">
         <HomeIcon class="w-5" />
       </span>
       <span class="text-sm text-gray-300">Users</span>
     </router-link>
     <router-link :to="{name: 'app.user'}" 
       class="flex items-center hover:bg-black/30 transition-colors p-2 rounded">
       <span class="mr-2">
         <HomeIcon class="w-5" />
       </span>
       <span class="text-sm text-gray-300">Roles</span>
     </router-link>
   </div>
 </template>
 
 <script setup>
 import { HomeIcon, UserIcon, ViewColumnsIcon, ChartBarIcon, ShoppingCartIcon } from '@heroicons/vue/20/solid';
 </script>