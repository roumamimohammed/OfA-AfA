<template>
  <div class="grid sm:grid-cols-4">
    <Sidebar class="sm:h-screen bg-gray-900 fixed" />
    <div class="sm:col-start-2 sm:col-span-3 w-full">
      <h1
        class="mt-10 mb-9 text-center text-4xl font-extrabold tracking-tight leading-none text-gray-900"
      >
        CATE<i class="bi bi-tags"></i>RY
      </h1>
      <div class="">
        <div class="container m-auto grid grid-cols-3 gap-3">
          <div
            v-for="(association,index) in associations"
            :key="association.id"
            class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700"
          >
            <div class="p-5">
              <a href="#">
                <h5
                  class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white"
                >
                  Numero:{{ association.id }}
                </h5>
              </a>
              <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">
                {{ association.nom }}
              </p>
              <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">
                {{ association.created_at.slice(0, 10) }}
              </p>
              <button
                @click="accepter(association.id,index)"
                type="button"
                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
              >
                <i class="bi bi-trash2-fill"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script >
import axios from "axios";
import Sidebar from "@/components/sidebar.vue";
import router from "@/router/index";
import { userStore } from "@/stores/user";

export default {
  name: "associations",
  setup() {
    const user = userStore();
    return { user };
  },
  data() {
    return {
      associations: [],
    };
  },
  components: {
    Sidebar,
  },

  methods: {
    getAssociation() {
      axios({
        method: "GET",
        url: "http://127.0.0.1:8000/api/active",
      }).then((res) => {
        console.log(res.data)
        this.associations = res.data;
      });
    },
     accepter(id,index) {

       axios({
        method: "PUT",
        url: "http://127.0.0.1:8000/api/activated_v2/" + id,
      })
        .then((res) => {
          // Handle response data here
          this.associations.splice(index,1)
          console.log(res.data);
        //   window.location.reload()    
        })
        .catch((err) => {
          // Handle error here
          console.log(err);
        });
       
    },
    
  },
  mounted() {
    this.getAssociation();
  },
};
</script>





