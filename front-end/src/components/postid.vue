<template>
    <div @click="show(id)" class="max-w-sm mb-7 bg-gray-100 border shadow-xl group hover:border-green-700 border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <center>
            <img class="rounded-t-lg h-60" :src="image" alt="image" />
       </center> </a>
        <div class="p-4">
            <a href="#">
                <h6 class="mb-2 text-xl font-bold tracking-tight text-green-900 dark:text-white group-hover:text-green-500">{{title}}</h6>
            </a>
            <a href="#">
                <h6 class="mb-2 text-xl font-bold tracking-tight text-green-900 dark:text-white group-hover:text-green-500">{{categorie}}</h6>
            </a>
            <a href="#">
                <h6 class="mb-2 text-xl font-bold tracking-tight text-green-900 dark:text-white group-hover:text-green-500">{{subtitle}}</h6>
            </a>
        </div>
        <div class="flex justify-around mb-7">
            <img src="../../public/images/association.png" class="h-6 mr-3 sm:h-9" alt="AFO&OFA Logo">
        </div>
    </div>
</template>

<script setup>
    import router from '@/router/index';
defineProps({
    id:Number,
    title: String,
    categorie:String,
    subtitle:String,
    image: String,
})

function show(id){
    router.push('/posts/'+id+'')
}

</script>