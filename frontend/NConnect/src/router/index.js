import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import IndexView from "@/views/IndexView.vue";
import AdminView from "@/views/AdminView.vue";
import AdminDashboardView from "@/views/AdminDashboardView.vue";
import CrudStagesView from "@/views/CrudStagesView.vue";
import RegisterView from "@/views/RegisterView.vue";
import CreateSponsorView from "@/views/CreateSponsorView.vue";
import CreateSpeakerView from "@/views/CreateSpeakerView.vue";
import ShowRegisteredUsers from "@/views/ShowRegisteredUsers.vue";
import AboutUsManager from '@/components/AboutUsManager.vue'; // Import the new component
import GalleryView from '@/views/GalleryView.vue'; // Import the new component
import GalleryManager from '@/components/GalleryManager.vue'; // Import the new component
import QuillEditor from '@/components/QuillEditor.vue';
import CustomSiteView from "@/views/CustomSiteView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'index',
      component: IndexView
    },
    {
      path: '/login',
      name: 'login',
      component: AdminView
    },
    {
      path: '/admin',
      name: 'Admin',
      component: AdminDashboardView,
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/register',
      name: 'register',
      component: RegisterView,
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/crud-stages',
      name: 'CrudStages',
      component: CrudStagesView, // Associate the route with the new view/component
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/create-sponsor',
      name: 'CreateSponsor',
      component: CreateSponsorView, // Associate the route with the new view/component
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/create-speaker',
      name: 'CreateSpeaker',
      component: CreateSpeakerView, // Associate the route with the new view/component
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/show-registered-users',
      name: 'ShowRegisteredUsers',
      component: ShowRegisteredUsers, // Associate the route with the new view/component
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/about-us',
      name: 'AboutUsManager',
      component: AboutUsManager, // Associate the route with the new component
      meta: { requiresAuth: true }
    },
    {
      path: '/gallery',
      name: 'GalleryView',
      component: GalleryView // Add the new route
    },
    {
      path: '/admin/gallery',
      name: 'GalleryManager',
      component: GalleryManager, // Add the new route
      meta: { requiresAuth: true }
    },

    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/editor',
      name: 'Editor',
      component: QuillEditor // Add route for QuillEditor
    },
    {
      path: '/path/:path',
      name: 'CustomSite',
      component: CustomSiteView, // Ensure this component exists
    },
  ]
});
function isAuthenticated() {
  const token = localStorage.getItem('adminToken');
  return !!token; // Convert to boolean
}

// Navigation guard to check authentication before accessing routes
router.beforeEach((to, from, next) => {
  // Check if the route requires authentication
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // If authentication is required
    if (!isAuthenticated()) {
      // If not authenticated, redirect to login page
      next('/login');
    } else {
      // If authenticated, proceed to the route
      next();
    }
  } else {
    // If the route doesn't require authentication, proceed to the route
    next();
  }
});

export default router
