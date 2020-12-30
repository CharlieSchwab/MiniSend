import CreateMail from './components/CreateMail.vue';
import ViewMail from './components/ViewMail.vue';
import EditMail from './components/EditMail.vue';

// This is the Vue route file

export const routes = [
    {
        name: 'home',
        path: '/',
        component: ViewMail
    },
    {
        name: 'create',
        path: '/create',
        component: CreateMail
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditMail
    }
];