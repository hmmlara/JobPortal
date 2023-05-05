import { createRouter, createWebHistory } from "vue-router";
import CategoryView from '../views/category/CategoryView.vue';
import AddCategoryView from '../views/category/AddCategoryView.vue';
import EditCategoryView from '../views/category/EditCategoryView.vue';


// admin category routes
const category = [
    {
        path: '',
        component: CategoryView,
        name: 'category.index'
    },
    {
        path: '/add',
        component: AddCategoryView,
        name: 'category.add'
    },
    {
        path: '/:id/edit',
        component: EditCategoryView,
        name: 'category.edit',
    }
];

// category route
const adminRoutes = [
    {
        path: '/dashboard',
        component: CategoryView,
        name: 'Dashboard',
    },
    ...prefixRoutes('/category',category)
];


const routes =[
    {
        path: '',
        redirect: '/admin/category'
    },
    ...prefixRoutes('/admin',adminRoutes),
];

function prefixRoutes(prefix, routes) {
    return routes.map(route => {
        route.path =  prefix + '' + route.path;
        return route;
    });
}
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;
