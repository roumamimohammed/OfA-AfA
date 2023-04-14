<template>

    <Header />
    <section class="bg-white dark:bg-gray-900 h-screen bg-[url('./images/12jpg.jpg')] bg-no-repeat bg-center bg-cover bg-fixed">
        
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
        <div>
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl dark:text-white">We invest in the world’s association</h1>
            <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">this website is a platform designed to assist users in creating their own association. It provides tools and resources to guide them through the process of setting up their association efficiently and effectively.</p>
           
        </div>

        <section>
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
     
     
      
          <!-- Association Card -->
         
             <router-link to="/loginassociation" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 mt-2 overflow-hidden text-sm font-medium text-white rounded-lg group bg-gradient-to-br from-green-600 bg-green-600 group-hover:to-green-500 hover:text-green-600 hover:bg-white  dark:text-white dark:focus:ring-green-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-green-600   dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Se connecter pour voir votre association
                    </span>
                </router-link>
                <router-link to="/signupassociation" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 mt-2 overflow-hidden text-sm font-medium text-white rounded-lg group bg-gradient-to-br from-green-600 bg-green-600 group-hover:to-green-500 hover:text-green-600 hover:bg-white  dark:text-white dark:focus:ring-green-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-green-600   dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        S'inscrire pour creer votre association
                    </span>
                </router-link>
       
           

         
    
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

</script>