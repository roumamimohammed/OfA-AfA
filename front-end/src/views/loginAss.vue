<template>
    
    <div class="h-screen md:flex">
      <div
          class="relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-green-200 to-green-900 i justify-around items-center hidden">
      <img src="images/association.png" class="" alt="Flowbite Logo">
      </div>
      <div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
          <div class="bg-white">
              <h1 class="text-gray-800 font-bold text-2xl mb-1">Hello Again!</h1>
              <p class="text-sm font-normal text-gray-600 mb-7">Welcome Back</p>
                      <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                              viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                          </svg>
                          <input class="pl-2 outline-none border-none" type="text" name="" id="" v-model="form.email"  placeholder="Email Address" />
              <p class="text-red-600"  v-text="errors.email" ></p>
        </div>
                          <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                  fill="currentColor">
                                  <path fill-rule="evenodd"
                                      d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                      clip-rule="evenodd" />
                              </svg>
                              <input class="pl-2 outline-none border-none" v-model="form.password" type="password" name="" id="" placeholder="Password" />
                <p class="text-red-600" v-text="errors.password"></p>
        </div>
                              <button @click="login" type="submit" class="block w-full bg-gradient-to-tr from-green-200 to-green-900 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Login</button>
                              
          </div>
      </div>
  </div>
  
  
  
  
    
  </template>
  
  
  <script setup>
    import { ref } from "vue";
    import Header from "@/components/header.vue";
    import {userStore} from "@/stores/user";
    import axios from 'axios';
  
    const form=ref({
      email:null,
      password:null,
    })
  
    const storeUser=userStore();
    const errors=ref({});
  
    async function login(){
      await axios.get('/sanctum/csrf-cookie')
      try {
          await axios.post("/login",{
            email:form.value.email,
            password:form.value.password,
          });
          let res=await axios.get('/api/user');
          storeUser.id=res.data.id;
          storeUser.nom=res.data.nom;
          storeUser.prenom=res.data.prenom;
          storeUser.email=res.data.email;
          storeUser.role=res.data.role;
          storeUser.redirect();
      } catch(error){
          errors.value=error.response.data.errors;
          console.log(errors.value);
      }
  
    }
  
  </script>