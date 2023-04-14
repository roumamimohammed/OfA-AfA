<template>

    <Header />
    <section class="bg-white dark:bg-gray-900 h-screen bg-[url('./images/12jpg.jpg')] bg-no-repeat bg-center bg-cover bg-fixed">
        
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
        <div>
            <a href="#" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700" role="alert">
                <span class="text-xs bg-green-700 rounded-full text-white px-4 py-1.5 mr-3"><router-link to="/espacassociation">Create yours</router-link></span> <span class="text-sm font-medium">If you have an association so wellcome</span> 
                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </a>
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl dark:text-white">We invest in the world’s association</h1>
            <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">this website is a platform designed to assist users in creating their own association. It provides tools and resources to guide them through the process of setting up their association efficiently and effectively.</p>
           
        </div>
        <section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Search By Category</h2>
          <input type="text" v-model="searchQuery" placeholder="Search...">
  
      </div> 
     
      
          <!-- Association Card -->
         
         <div class="grid grid-cols-1 gap-6 justify-center sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">
        <div v-for="post in filteredPosts" :key="post.id">
            <Post :id="post.id" :image="post.image" :categorie="post.categorie.nom" :title="post.title" :subtitle="post.subtitle" />
       
    
</div>
          <!-- Association Card -->
         
      </div>
  </div>
</section>


   
</div>
<Footer />
</section>

    
</template>

<script setup>
  import Header from '@/components/header.vue'
  import Post from '@/components/post.vue'
  import Footer from '@/components/footer.vue'
  import { onMounted, ref, computed } from 'vue';
  import { getPosts } from '@/api/post';

  const posts = ref([]);
  const searchQuery = ref('');
  

  onMounted(async () => {
    //wait data 
    getPosts().then(function(res) {
      posts.value = res;
    });
  });

  const filteredPosts = computed(() => {
    return posts.value.filter(post => {
      return post.categorie.nom.toLowerCase().includes(searchQuery.value.toLowerCase());
    });
  });
</script>