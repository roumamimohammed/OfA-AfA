
<style>
 .sidebar{
      transition:all .5s ease-in-out;
    }
</style>
<template>

   
  

<div class="min-h-screen bg-gray-100">
  <div class="sidebar min-h-screen w-[0rem] h-[3.35rem] overflow-hidden border-r hover:w-56 hover:h-76 hover:bg-white hover:shadow-lg">
    <div class="flex h-screen flex-col justify-between pt-2 pb-6">
      <div>
        <div class="absolute w-[12rem] ">
          &emsp;<b><i>MENU</i></b> <img src="https://www.nsbpictures.com/wp-content/uploads/2018/09/magic-book.png" class="w-12" alt="">
        </div>
        <br><br><br><br>
        <ul class="mt-6 space-y-2 tracking-wide">
          <li class="min-w-max">
            <a href="#" aria-label="dashboard" class="relative flex items-center space-x-4 bg-gradient-to-r from-sky-600 to-cyan-400 px-4 py-3 text-white">
              <i class="bi bi-house-door-fill"></i>
              <router-link to="/admin/ajouter_livre"><span class="text-[15px] ml-4 text-gray-200 font-bold">Demande d'Activation</span></router-link> 
            </a>
          </li>
          <li class="min-w-max">
            <a href="#"  class="relative flex items-center space-x-4 bg-gradient-to-r from-sky-600 to-cyan-400 px-4 py-3 text-white">
              <i class="bi bi-book-fill"></i>
              <router-link to="/admin/livres"><span class="text-[15px] ml-4 text-gray-200 font-bold">Association Activer</span></router-link> 
   
            </a>
          </li>
          <li class="min-w-max">
            <a href="#" aria-label="dashboard" class="relative flex items-center space-x-4 bg-gradient-to-r from-sky-600 to-cyan-400 px-4 py-3 text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                <path class="fill-current text-gray-300 group-hover:text-cyan-300" d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
              </svg>
              <router-link to="/admin/groupes"><span class="text-[15px] ml-4 text-gray-200 font-bold">Les Signal</span></router-link> 
            </a>
          </li>
        </ul>
      </div>
      <div class="w-max -mb-3">
        <a href="#" class="group flex items-center space-x-4 rounded-md px-4 py-3 text-blue-900">
          <i class="bi bi-box-arrow-in-right"></i>
        <span @click="logout" class="text-[15px] ml-4 text-blue-600 font-bold">Déconnecter</span>
        </a>
      </div>
    </div>
  </div>
</div>
  


</template>

<script >

import { userStore } from '@/stores/user'
import router from "@/router/index";
export default {
    name:'sidebar',
    setup(){
      const user = userStore()
      return { user }
    },
    methods :{
        openSidebar() {
            document.querySelector(".sidebar").classList.toggle("hidden");
        },
        logout(){
           this.user.$reset();
           this.user.logout();
            router.push('/');
        }
    }
}
</script>