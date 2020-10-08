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
          path: 'Realestate_list',
          name: 'Realestate_list',
          component: () => import('@/views/back/Realestate_list.vue'),
        },
        {
          path: 'Realestate_create',
          name: 'Realestate_create',
          component: () => import('@/views/back/Realestate_create.vue'),
        },
        {
          path: 'Realestate_edit',
          name: 'Realestate_edit',
          component: () => import('@/views/back/Realestate_edit.vue'),
        },
        {
          path: 'Vehicle_list',
          name: 'Vehicle_list',
          component: () => import('@/views/back/Vehicle_list.vue'),
        },
        {
          path: 'Vehicle_create',
          name: 'Vehicle_create',
          component: () => import('@/views/back/Vehicle_create.vue'),
        },
        {
          path: 'Vehicle_edit',
          name: 'Vehicle_edit',
          component: () => import('@/views/back/Vehicle_edit.vue'),
        },
        {
          path: 'Vehicle_registration',
          name: 'Vehicle_registration',
          component: () => import('@/views/back/Vehicle_registration.vue'),
        },
        {
          path: 'CellPhone_list',
          name: 'CellPhone_list',
          component: () => import('@/views/back/CellPhone_list.vue'),
        },
        {
          path: 'CellPhone_create',
          name: 'CellPhone_create',
          component: () => import('@/views/back/CellPhone_create.vue'),
        },
        {
          path: 'CellPhone_edit',
          name: 'CellPhone_edit',
          component: () => import('@/views/back/CellPhone_edit.vue'),
        },
        {
          path: 'CellPhone_Plan_list',
          name: 'CellPhone_Plan_list',
          component: () => import('@/views/back/CellPhone_Plan_list.vue'),
        },
        {
          path: 'CellPhone_Plan_create',
          name: 'CellPhone_Plan_create',
          component: () => import('@/views/back/CellPhone_Plan_create.vue'),
        },
        {
          path: 'CellPhone_Plan_edit',
          name: 'CellPhone_Plan_edit',
          component: () => import('@/views/back/CellPhone_Plan_edit.vue'),
        },
        {
          path: 'CellPhone_addons_list',
          name: 'CellPhone_addons_list',
          component: () => import('@/views/back/CellPhone_addons_list.vue'),
        },
        {
          path: 'CellPhone_addons_create',
          name: 'CellPhone_addons_create',
          component: () => import('@/views/back/CellPhone_addons_create.vue'),
        },
        {
          path: 'CellPhone_addons_edit',
          name: 'CellPhone_addons_edit',
          component: () => import('@/views/back/CellPhone_addons_edit.vue'),
        },
        {
          path: 'Mypage',
          name: 'Mypage',
          component: () => import('@/views/back/Mypage.vue'),
        },
        
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
