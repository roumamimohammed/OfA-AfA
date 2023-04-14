<template>
  <Header />

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
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
					fill="currentColor">
					<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
						clip-rule="evenodd" />
				</svg>
						<input class="pl-2 outline-none border-none" type="text" name="" id="" v-model="form.nom" placeholder="Name" />
            <p class="text-red-600">{{ errors.nom }}</p>
      </div>
      <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
						viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
					</svg>
						<input class="pl-2 outline-none border-none" type="text" name="" id="" v-model="form.prenom"  placeholder="Prenom" />
            <p class="text-red-600" v-text="errors.prenom"></p>
      </div>
					<div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
						</svg>
						<input class="pl-2 outline-none border-none" type="text" name="" id="" v-model="form.email"  placeholder="Email Address" />
            <p class="text-red-600"  v-text="errors.email" ></p>
           </div>
         
   
						<div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
								fill="currentColor">
								<path fill-rule="evenodd"
									d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
									clip-rule="evenodd" />
							</svg>
							<input class="pl-2 outline-none border-none" v-model="form.password" type="password" name="" id="" placeholder="Password " />
              <p class="text-red-600" v-text="errors.password"></p>
            </div>
            
            <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
								fill="currentColor">
								<path fill-rule="evenodd"
									d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
									clip-rule="evenodd" />
							</svg>
							<input class="pl-2 outline-none border-none" v-model="form.confirmation" type="password" name="" id="" placeholder="Password confirmation" />
              <p class="text-red-600" v-text="errors.confirmation"></p>
            </div>
							<button @click="register" type="submit" class="block w-full bg-gradient-to-tr from-green-200 to-green-900 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Register</button>
							
		</div>
	</div>
</div>
  



</template>

<script setup>
  import { ref } from "vue";
  import Header from "@/components/header.vue";
  import axios from 'axios';
  import {userStore} from "@/stores/user";
import router from "../router";
  //data input
  const form=ref({
    nom:null,
    prenom:null,
    email:null,
    password:null,
    confirmation:null,
  })
  //data errors
  const storeUser=userStore();
  const errors=ref({});
  async function register(){
    //get token
    await axios.get('/sanctum/csrf-cookie')
    try {
        await axios.post("/register",{
          nom:form.value.nom,
          prenom:form.value.prenom,
          email:form.value.email,
          password:form.value.password,
          password_confirmation:form.value.confirmation,
          role:0
        });
        let res=await axios.get('/api/user');
        storeUser.id=res.data.id;
        storeUser.nom=res.data.nom;
        storeUser.prenom=res.data.prenom;
        storeUser.email=res.data.email;
        storeUser.role=res.data.role;
        storeUser.redirect();
        // router.push({ path: 'login' })
    } catch(error){
        errors.value=error.response.data.errors;
        console.log(errors.value);
    }
    
  }

</script>