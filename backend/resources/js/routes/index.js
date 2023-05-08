import { createRouter, createWebHistory } from "vue-router";
import CategoryView from '../views/category/CategoryView.vue';
import AddCategoryView from '../views/category/AddCategoryView.vue';
import EditCategoryView from '../views/category/EditCategoryView.vue';

// Company
import CompanyView from '../views/company/CompanyView.vue';
import AddCompanyView from '../views/company/AddCompanyView.vue';
import EditCompanyView from '../views/company/EditCompanyView.vue';

// Job Type
import JobTypeView from '../views/jobtype/JobTypeView.vue';
import AddJobTypeView from '../views/jobtype/AddJobTypeView.vue';
import EditJobTypeView from '../views/jobtype/EditJobTypeView.vue';

// Job Post
import JobPostView from '../views/jobpost/JobPostView.vue';
import AddJobPostView from '../views/jobpost/AddJobPostView.vue';
import EditJobPostView from '../views/jobpost/EditJobPostView.vue';

// location
import LocationView from '../views/location/LocationView.vue';
import AddLocationView from '../views/location/AddLocationView.vue';
import EditLocationView from '../views/location/EditLocationView.vue';


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

// admin company routes
const company = [
    {
        path: '',
        component: CompanyView,
        name: 'company.index'
    },
    {
        path: '/add',
        component: AddCompanyView,
        name: 'company.add',
    },
    {
        path: '/:id/edit',
        component: EditCompanyView,
        name: 'company.edit'
    }
];

// admin jobtype route
const jobtype = [
    {
        path: '',
        component: JobTypeView,
        name: 'jobtype.index'
    },
    {
        path: '/add',
        component: AddJobTypeView,
        name: 'jobtype.add'
    },
    {
        path: '/:id/edit',
        component: EditJobTypeView,
        name: 'jobtype.edit'
    }

];

// admin jobpost route
const jobpost = [
    {
        path: '',
        component: JobPostView,
        name: 'jobpost.index'
    },
    {
        path: '/add',
        component: AddJobPostView,
        name: 'jobpost.add'
    },
    {
        path: '/:id/edit',
        component: EditJobPostView,
        name: 'jobpost.edit'
    }
];

// admin location route
const location = [
    {
        path: '',
        component: LocationView,
        name: 'location.index'
    },
    {
        path: '/add',
        component: AddLocationView,
        name: 'location.add'
    },
    {
        path: '/:id/edit',
        component: EditLocationView,
        name: 'location.edit'
    }
];

// category route
const adminRoutes = [
    {
        path: '/dashboard',
        component: CategoryView,
        name: 'Dashboard',
    },
    ...prefixRoutes('/category',category),
    ...prefixRoutes('/company', company),
    ...prefixRoutes('/jobtype',jobtype),
    ...prefixRoutes('/jobpost',jobpost),
    ...prefixRoutes('/location',location),
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
