import { createRouter, createWebHistory } from "vue-router";

import AdminRequestsView from "../views/AdminRequestsView.vue";
import FeatureRequestDetailView from "../views/FeatureRequestDetailView.vue";
import PublicBoardView from "../views/PublicBoardView.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/admin',
            name: 'admin-requests',
            component: AdminRequestsView,
        },
        {
            path: '/requests/:requestId',
            name: 'feature-request-detail',
            component: FeatureRequestDetailView,
        },
        {
            path: '/',
            name: 'public-board',
            component: PublicBoardView,
        }   
    ],
});

export default router;