<template>
    <div>
        <Header/>
        <router-view/>
    </div>
</template>

<script>
import Header from './components/Header.vue'
import Article from './pages/Article.vue'
import AddArticle from './pages/AddArticle.vue'
import ViewArticle from './pages/ViewArticle.vue'
export default {
    name: 'App',
    components: {
        Header, Article, AddArticle, ViewArticle
    }
}
</script>

<style>

</style>
