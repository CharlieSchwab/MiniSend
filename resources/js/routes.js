import CreateMail from './components/CreateMail.vue';
import ViewMail from './components/ViewMail.vue';
import EditMail from './components/EditMail.vue';
import ViewSingleMail from './components/ViewSingleMail.vue';

// This is the Vue route file

export const routes = [


    // The main route
    {
        name: 'home',
        path: '/',
        component: ViewMail
    },

    // The route for mail creation and sending
    {
        name: 'create',
        path: '/create',
        component: CreateMail
    },

    // Route for editing a sent message and resending
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditMail
    },

    // Route for viewing a single email with HTML support
    {
        name: 'view',
        path: '/view/:id',
        component: ViewSingleMail
    }
];