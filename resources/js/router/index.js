import { createRouter, createWebHistory } from 'vue-router'
import list from "../pages/customer/list/list.vue";
import form from "../pages/customer/form/form.vue";
import profile from "../pages/customer/profile/profile.vue";

const routes = [
    { path: '/', name: 'Customers', component: list  },
    { path: '/customer/add', name: 'newCustomers', component: form  },
    { path: '/customer/:id/edit', name: 'editCustomer', component: form ,  props: true, },
    { path: '/customer/:id/profile', name: 'customerProfile', component: profile ,  props: true },
];

const index = new createRouter({
    history: createWebHistory(),
    linkExactActiveClass: 'active',
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { left: 0, top: 0 };
        }
    },
});

index.beforeEach((to, from) => {

})

export default index;
