import axios from 'axios'
import { defineStore } from 'pinia'
import router from '../router/index'


export const userStore = defineStore('userStore', {
  state: () => {
    return {
        id: '',
        nom: '',
        prenom: '',
        email: '',
        role: '',
    }
  },
  actions: {
    redirect: function() {
        if (this.role === 0) {
            router.push('/home')
        } else if (this.role === 1) {
            router.push('/Association')
        } else {
          router.push('/')
        }
    },
    //check if user for toggling navbar in partie user
    checkifUserORassociaction: function() {
      let isUser = false;
      if ((this.role === 0) ||(this.role === 1) && this.id !== '') {
        isUser = true;
      }
      return isUser;
    },
    checkifAssociation: function() {
      let isUser = false;
      if (this.role === 1 && this.id !== '') {
        isUser = true;
      }
      return isUser;
    },

    //logout
    logout: async function() {
      try {
        await axios.post('/logout');
      } catch (error) {
        console.log(error);
      }
    },
  },
  persist: true,
});

// set default headers for axios requests

