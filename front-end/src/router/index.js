import { createRouter, createWebHistory } from 'vue-router'
import { userStore } from '../stores/user'
//route guest
import axios from 'axios'
import notfound from '../components/notfound.vue'
import Login from '@/views/login.vue'
import Signup from '@/views/signup.vue'
import LoginAss from '@/views/loginAss.vue'
import SignupAss from '@/views/signupAss.vue'
import Index from '@/views/index.vue'
import Home from '@/views/user/home.vue'
import Posts from '@/views/user/posts.vue'
import Espace from '@/views/espaceuser.vue'
import Association from '@/views/Association/Association.vue'
import statistique from '@/views/admin/statistique.vue'
import signals from '@/views/admin/signals.vue'
import demande from '@/views/admin/demande.vue'
import active from '@/views/admin/active.vue'


//routes user 


//route formateur 

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Index,
  },
  {
    path: '/demande',
    name: 'demande',
    component: demande,
    meta: { requiresAdmine: true }
  },
  {
    path: '/active',
    name: 'active',
    component: active,
    meta: { requiresAdmine: true }
  },
  {

    path: '/statistique',
    name: 'statistique',
    component: statistique,
    meta: { requiresAdmine: true }
  },
  {
    path: '/signals',
    name: 'signals',
    component: signals,
    meta: { requiresAdmine: true }
  },
  {
    path: '/Association',
    name: 'Association',
    component: Association,
    meta: { requiresAssociation: true }
  },
  {
    path: '/home',
    name: 'HomeUser',
    component: Home,
    meta: { requiresAuth: true }
  
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
  },
  {
    path: '/signup',
    name: 'Signup',
    component: Signup,
  },
  {
    path: '/loginassociation',
    name: 'LoginAss',
    component: LoginAss,
  },
  {
    path: '/signupassociation',
    name: 'SignupAss',
    component: SignupAss,
  },
  {
    path: '/posts/:id',
    name: 'posts',
    component: Posts,
  },
  {
    path: '/espacassociation',
    name: 'espaceuser',
    component: Espace,
  },
];


const router = createRouter({
  history: createWebHistory(),
  routes
});

// set default headers for axios requests



// authenticate user on protected routes
router.beforeEach((to, from, next) => {
  document.title = to.name;
  
  if (to.matched.some(record => record.meta.requiresAuth)) {
    const j=JSON.parse(localStorage.userStore);
    console.log(j)

    if (j.role===0)  {
      next();
    }
    next('/');
      return;
  } else if(to.matched.some(record => record.meta.requiresAdmine)){
    const j=JSON.parse(localStorage.userStore);
    console.log(j)

    if (j.role===2)  {
      next();
    }
    next('/');
      return;

  }else if(to.matched.some(record => record.meta.requiresAssociation)){
    const j=JSON.parse(localStorage.userStore);
    console.log(j)

    if (j.role===1)  {
      next();
    }
    next('/');
      return;

  }
  else {
    next();
  }
});

export default router;
