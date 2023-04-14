import axios from 'axios'
import { defineStore } from 'pinia'
import {getPostByid} from '@/api/post.js'
import router from '../router/index'
export const PostsStore = defineStore('PostsStore', {
  state: () => {
    return {
        post:{
          title:'',
          subtitle:'',
          categorie:'',
          image:'',
        },
        
        asso:{
          nom:'',
          prenom:'',
          email:'',
          description:'',
          tele:''
        }
        
    }
  },
  actions:{
    getPostsbyId:async function(id){
      let posts = await getPostByid(id);
      
      this.post.title=posts[0].title;
      this.post.subtitle=posts[0].subtitle;
      this.post.image=posts[0].image;
      
   

      this.asso.nom=posts[0].asso.nom;
      this.asso.prenom=posts[0].asso.prenom;
      this.asso.email=posts[0].asso.email;
      this.asso.description=posts[0].asso.description;
      this.asso.tele=posts[0].asso.tele;

      
    }
  },
  persist: true,
})