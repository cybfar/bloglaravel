<template>
    <div id="article" class="relative">
        <div class="w-full md:w-4/5 mx-auto">
        <Spinner v-if="isLoading" ></Spinner>
            <div class="mx-5 my-3 text-sm">
            <a href="" class=" text-blue-600 uppercase font-bold tracking-widest">{{ article.category_id }}</a>
            </div>
            <div class="w-full text-gray-800 text-4xl px-5 mb-4 font-bold leading-none">
               {{ article.title }}
            </div>
            <div class="mx-5">
            <img src="https://via.placeholder.com/1920x1080" alt="Article Img">
            </div>

            <div class="w-full text-gray-600 text-normal mx-5">
                <p class="border-b py-3">https://placeholder.com | Placeholder Images</p>
            </div>

            <div class="w-full text-gray-600 font-thin italic px-5 pt-3">
                Par <strong class="text-gray-700">Admin</strong><br>
                Publié le 07/17/2020 09:57<br>
                Edité le: 07/17/2020 10:33
            </div>

            <div class="px-5 w-full mx-auto">
                <p class="my-5">{{ article.content }}</p>
                <p class="my-5">{{ article.content }}</p>
                <p class="my-5">{{ article.content }}</p>
                <p class="my-5">{{ article.content }}</p>
                <p class="my-5">{{ article.content }}</p>
                </div>
        </div>
    </div>

</template>

<script>
import { ref, onMounted, onBeforeMount } from "vue";
import { useRouter, useRoute } from 'vue-router';
import Spinner from '../components/Spinner.vue'


export default {
    name: 'ViewArticle',
     components : {
    Spinner,
    },

    setup() {
         const article = ref([])
         const isLoading = ref(true)

        const router = useRouter()
        const route = useRoute()

        async function getArticle() {
            window.scrollTo({ top: 0});
            axios.get('/api/article/view/' + route.params.id)
                .then(response => {
                    article.value = response.data
                    console.log(article.value);
                })
                .catch(error => {
                    console.log(error)
                })
        }

        onBeforeMount(() => {
            window.scrollTo({ top: 0});
            axios.get('/api/article/view/' + route.params.id)
                .then(response => {
                    article.value = response.data
                    console.log(article.value);
                    isLoading.value = false;
                })
                .catch(error => {
                    console.log(error)
                })


        }),

        onMounted(() => {
            getArticle();
        })

      /*   function DeleteProduct() {
            axios.delete('/api/product/delete/' + route.params.id)
                .then(response => {
                    console.log(response)
                    router.push({path: '/'})
                })
                .catch(error => {
                    console.log(error)
                })
        } */

        return { article, isLoading }
    }

}
</script>

<style>

</style>
