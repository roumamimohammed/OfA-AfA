<template>

    <div class="grid sm:grid-cols-4">
        <Sidebar class="sm:h-screen bg-gray-900 fixed"/>
        <div class="sm:col-start-2 sm:col-span-3 mx-auto w-full">
            <h1 class="mt-10 mb-9 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900">US<i class="bi bi-people-fill">RS</i></h1>
            <div class="container m-auto grid grid-cols-3 gap-3">
                <div class="relative max-w-md mx-auto md:max-w-2xl mt-6 min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-xl " v-for="signal in signals" :key="signal.id" >
    <div class="px-6">
        <div class="flex flex-wrap justify-center">
            <div class="w-full flex justify-center">
               
            </div>
        </div>
        <div  class="text-center mt-2">
           
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1"> 
                <i class="bi bi-person-circle"></i>&emsp;  {{ signal.name}} {{ signal.description }} </h3>
        
            <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                <h2 class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"><i class="bi bi-envelope"></i>  {{ signal.post.title }}</h2>
            </div>
        </div>
       
    </div>
</div>


               
            </div>
        </div>
    </div>


</template>


<script>

    import axios from 'axios'
    import Sidebar from '@/components/sidebar.vue'
    import { userStore } from '@/stores/user'
    export default {
    name:'signals',
    setup(){
        const user = userStore()
        return { user }
    },

    data(){
        return{
            signals:""
        }
       
    },
    components:{
        Sidebar
    },
    methods:{
        getsignals(){
            axios({
                method: 'GET',
                url: 'http://127.0.0.1:8000/api/signals',
                })
                .then((res) =>{
                    console.log(res.data)
                    this.signals=res.data;
                    
                    
            })
           
        
        }
    },
    mounted(){
        this.getsignals();
    }
    }
</script>