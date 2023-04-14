<template>

    <Header />
    <section class="bg-white dark:bg-gray-900 h-screen bg-[url('../../public/images/12jpg.jpg')] bg-no-repeat bg-center bg-cover bg-fixed">
        
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
        <div>
            <a href="#" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700" role="alert">
                <span class="text-xs bg-green-700 rounded-full text-white px-4 py-1.5 mr-3"><router-link to="/devenirformateur">Create yours</router-link></span> <span class="text-sm font-medium">If u have ana association so wellcome</span> 
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
        
            <post :id="Posts.id"  :title="Posts.title" :subtitle="Posts.subtitle" :image="Posts.image" />
            <h2>Ratings</h2>
            <!-- <div class="rating">
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
</div> -->



<star-rating :rating="averageRating" :star-size="20" :read-only="true"/>


    <p>Average rating: {{ averageRating }}</p>
    <div class="rating">
  <i v-for="n in filledStars" :key="n" class="fas fa-star"></i>
  <i v-for="n in emptyStars" :key="n" class="far fa-star"></i>
</div>


    <form v-on:submit.prevent="createRating">
      <div class="form-group">
        <label for="rating">Rating:</label>
        <!-- <star-rating v-model="rating"></star-rating> -->
        <select class="form-control" id="rating" v-model="rating">
          <option value="1">1 star</option>
          <option value="2">2 stars</option>
          <option value="3">3 stars</option>
          <option value="4">4 stars</option>
          <option value="5">5 stars</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
            <button @click="toggle()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i class="bi bi-pencil-square"></i></button>
          <!-- Association Card -->
         
      </div>
      <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close hidden">&times;</span>

                    <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Modifier une categorie</h3>
                            <hr class="mb-11">
                            <form class="space-y-6">
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Signal</label>
                                    <input type="text" v-model="name" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="signal" required>
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Signal</label>
                                    <input type="text" v-model="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="description" required>
                                </div>
                                <button  type="button" @click="addSignal" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Signaler</button>
                            </form>
                        </div>
                    </div> 
                 </div>
  </div>
</section>


   
</div>
<Footer />
</section>

    
</template>

<script>
import { userStore } from "@/stores/user"
import axios from 'axios'
import StarRating from 'vue-star-rating'
import Header from '@/components/header.vue'
import post from '@/components/postid.vue'
import Footer from '@/components/footer.vue'
  import router from "@/router/index";
//   import { mounted, ref, computed } from 'vue';
  export default {
  name: "associations",
  setup() {
    const user = userStore();
    // const Posts = ref([]);
    return { user };
  },
  data() {
    return {
      Posts:""  ,
      rating: 0,
      resourceId: 1, // or whatever the ID of the resource is
      averageRating: null
    };
  },
  components: {
    Header,post,Footer,StarRating
  },
  computed: {
  filledStars() {
    return Math.round(this.averageRating);
  },
  emptyStars() {
    return 5 - this.filledStars;
  }
}
,

  methods: {
    createRating() {
      axios.post('/api/ratings', {
        user_id: this.user.id, // or whatever the ID of the user is
        post_id: this.$route.params.id,
        rating: this.rating
      })
      .then(response => {
        console.log(response.data);
        this.getAverageRating();
      })
      .catch(error => {
        console.log(error.response.data);
      });
    },
    getAverageRating() {
      axios.get('/api/ratings/' + this.$route.params.id)
      .then(response => {
        console.log(response.data);
        this.averageRating = response.data.data;
      })
      .catch(error => {
        console.log(error.response.data);
      });
    },
    getPost() {
        console.log("tester" );
        console.log(this.$route.params.id);

      axios({
        method: "GET",
        url: "http://127.0.0.1:8000/api/post/"+this.$route.params.id,
      }).then((res) => {        
        this.Posts = res.data[0];
        console.log(this.Posts.image);

      });
    },   
    addSignal(){
            if(this.name!='' && this.description!=''){
              const formData = new FormData();
formData.append('name', this.name);
formData.append('description', this.description);
formData.append('post_id', this.$route.params.id);
formData.append('user_id', this.user.id);
              
              axios({
                method: 'POST',
                url: 'http://127.0.0.1:8000/api/signaler',
                data: formData,
                })
                .then((res) =>{
                    if(res.date){
                        var modal = document.getElementById("myModal");
                        modal.style.display = "none";
                         this.name='';
                         this.description=''
                    }
                })
            } 
        },
    toggle(){
               
                var modal = document.getElementById("myModal");
                var span = document.getElementsByClassName("close")[0];
                modal.style.display = "block";
                span.onclick = function() {
                    modal.style.display = "none";
                }
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
        },
    
    
  },
  mounted() {
    this.getPost();
    this.getAverageRating();
    // this.addSignal()
  },
};

    // import { PostsStore } from "@/stores/posts.js";
    // const Posts=PostsStore()
    // const Posts = ref({})
    // ajouter au pannier
    // onMounted(()=>{
    //     // Posts.getCoursbyId(Posts.params.id)
    // })
</script>


<style scoped>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
.rating {
  display: inline-block;
  font-size: 1.5em;
  color: #ffc107;
}

.rating i {
  margin-right: 5px;
}

.rating i.fa-star {
  color: #ffc107;
}

.rating i.fa-star-o {
  color: #eee;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>