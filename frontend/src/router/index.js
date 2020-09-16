// Imports
import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const router = new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  scrollBehavior: (to, from, savedPosition) => {
    if (to.hash) return { selector: to.hash }
    if (savedPosition) return savedPosition

    return { x: 0, y: 0 }
  },
  routes: [
    {
      path: '/',
      component: () => import('@/layouts/home/Index.vue'),
      children: [
        {
          path: '',
          name: 'Home',
          component: () => import('@/views/front/home/Index.vue'),
        },
        {
          path: 'about',
          name: 'About',
          component: () => import('@/views/front/about/Index.vue'),
          meta: { src: require('@/assets/about.jpg') },
        },
        {
          path: 'contact-us',
          name: 'Contact',
          component: () => import('@/views/front/contact-us/Index.vue'),
          meta: { src: require('@/assets/contact.jpg') },
        },
        {
          path: 'pro',
          name: 'Pro',
          component: () => import('@/views/front/pro/Index.vue'),
          meta: { src: require('@/assets/pro.jpg') },
        },
        {
          path: 'Login',
          name: 'Login',
          component: () => import('@/views/front/Login/Login.vue'),
        },
        // {
        //   path: '*',
        //   name: 'FourOhFour',
        //   component: () => import('@/views/404/Index.vue'),
        // },
      ],
    },
    {
      path: '/page',
        component: () => import('@/layouts/dashboard/Index.vue'),
        children: [
        {
          path: 'dashboard',
          name: 'Dashboard',
          component: () => import('@/views/back/Dashboard.vue'),
        },
        {
          path: 'mypage',
          name: 'Mypage',
          component: () => import('@/views/back/Mypage.vue'),
        },
        //예제  ---------------------------------------------
        //예제  ---------------------------------------------
        // Pages
        {
          name: 'User Profile',
          path: 'user',
          component: () => import('@/views/back/UserProfile'),
        },
         // Tables
         {
          name: 'Regular Tables',
          path: 'tables/regular-tables',
          component: () => import('@/views/back/RegularTables'),
        },
        {
          name: 'Typography',
          path: 'components/typography',
          component: () => import('@/layouts/dashboard/component/Typography'),
        },
        {
          name: 'Icons',
          path: 'components/icons',
          component: () => import('@/layouts/dashboard/component/Icons'),
        },
        {
          name: 'Notifications',
          path: 'components/notifications',
          component: () => import('@/layouts/dashboard/component/Notifications'),
        },
        // Maps
        {
          name: 'Google Maps',
          path: 'maps/google-maps',
          component: () => import('@/views/back/GoogleMaps'),
        },
        // Upgrade
        {
          name: 'Upgrade',
          path: 'upgrade',
          component: () => import('@/views/back/Upgrade'),
        },
        //예제  ---------------------------------------------
      ],
    }
    
  ],
})

export default router
