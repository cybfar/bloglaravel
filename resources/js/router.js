import { createRouter, createWebHistory } from "vue-router";

import AddArticle from './pages/AddArticle.vue';
import Article from './pages/Article.vue';
import ViewArticle from './pages/ViewArticle.vue';
import EditArticle from './pages/EditArticle.vue';

const routes = [
    {path: '/', component: Article},
    {path: '/add-article', component: AddArticle},
    {path: '/edit-article/:id', component: EditArticle},
    {path: '/view-article/:id', component: ViewArticle},
    {path: '/view-article/', redirect : '/'},
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})


export default router;

