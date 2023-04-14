<template>
  <div
    class="max-w-sm mb-7 bg-gray-100 border shadow-xl group hover:border-green-700 border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700"
  >
    <a href="#">
      <center>
        <img class="rounded-t-lg h-60" :src="ass.image" alt="image" />
      </center>
    </a>
    <div class="p-4">
      <a href="#">
        <input
          class="mb-2 text-xl font-bold tracking-tight text-green-900 dark:text-white group-hover:text-green-500"
          v-model="ass.title"
        >
          <!-- {{ ass?.title }} -->
        
      </a>
      
      <a href="#">
        <input
          class="mb-2 text-xl font-bold tracking-tight text-green-900 dark:text-white group-hover:text-green-500"
          v-model="ass.subtitle"
          >
         
        
      </a>
      <button @click="update" type="submit" class="block w-full bg-gradient-to-tr from-green-200 to-green-900 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">update</button>
      <button @click="delet" type="submit" class="block w-full bg-gradient-to-tr from-green-200 to-green-900 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">delete</button>
											
    </div>
    <div class="flex justify-around mb-7">
      <img
        src="images/association.png"
        class="h-6 mr-3 sm:h-9"
        alt="AFO&OFA Logo"
      />
    </div>
  </div>
</template>

<script setup>
import axios from "axios";
import router from "@/router/index";
import {userStore} from "@/stores/user";
import { onMounted, ref } from "vue";
// import {userStore} from "@/stores/user";
// const storeUser=userStore();
const ass = ref({
    subtitle:null,
    title:null,
    image:null,
    id:null
    });
 const storeUser=userStore();

 async function update(){

     await axios.put("api/update/"+ass.value.id,{
        subtitle:ass.value.subtitle,
        title:ass.value.title,
       
         })
         router.push('/Association') }
         async function delet(){

await axios.delete("api/destroy/"+ass.value.id)
        storeUser.logout();
        storeUser.$reset();
        router.push('/')

    
}
       
onMounted(async () => {
  const { data } = await axios.get("api/show/"+storeUser.id);
  console.log(data);
  ass.value = data[0];
});
</script>