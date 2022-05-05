<template>
  <div class="w-full flex justify-center">
    <div class="w-4/6">
    <Spinner v-if="isLoading" ></Spinner>
      <div
        v-for="article in articles"
        :key="article.id"
        class="max-w-4xl px-10 my-4 py-6 bg-white rounded-lg shadow-md"
      >
        <div class="flex justify-between items-center">
          <span class="font-light text-gray-600">mar 10, 2019</span>
          <a
            class="
              px-2
              py-1
              bg-gray-600
              text-gray-100
              font-bold
              rounded
              hover:bg-gray-500
            "
            href="#"
            >{{ article.category_id }}</a
          >
        </div>
        <div class="mt-2">
          <a
            class="text-2xl text-gray-700 font-bold hover:text-gray-600"
            href="#"
            >{{ article.title }}</a
          >
          <p class="mt-2 text-gray-600">
            {{ article.content.slice(0, 250) + "..." }}
          </p>
        </div>
        <div class="flex justify-between items-center mt-4">
          <div>
              <router-link
            :to="'/view-article/' + article.id"
            class="text-white bg-gray-600 hover:bg-gray-900 rounded-sm px-2 py-1 mr-1"
            >Read more</router-link
          >

              <router-link
            :to="'/edit-article/' + article.id"
            class="text-white bg-blue-600 hover:bg-blue-900 rounded-sm px-2 py-1 mr-1"
            >Edit</router-link
          >
              <router-link
            :to="'/view-article/' + article.id"
            class="text-white bg-red-600 hover:bg-red-900 rounded-sm px-2 py-1 mr-1"
            >Delete</router-link
          >

          </div>
          <div>
            <a class="flex items-center" href="#">
              <img
                class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block"
                src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=Admin"
                alt="avatar"
              />
              <h1 class="text-gray-700 font-bold">By Admin</h1>
            </a>
          </div>
        </div>
      </div>
    </div>
      <div class="w-3/12 h-screen rounded-lg shadow-md py-5 text-center px-5">
            <h2 class="font-medium text-sm">Filtrer par Catégories</h2>
            <select @change="sortCategory" v-model="defaultCategory" class=" p-1 mt-5 w-full border rounded-lg" name="filter" id="filter">
                <option value="none" selected disabled hidden>Toutes les catégories</option>
                <option v-for="categorie in categories" :key="categorie" :value="categorie.id">{{ categorie.name }}</option>
            </select>
            {{ defaultCategory }}
        </div>
  </div>
</template>

<script>

import { ref, onMounted, computed } from "vue";
import Spinner from '../components/Spinner.vue'
export default {
  name: "Article",
  components : {
    Spinner,
    },
  setup() {
    const axios = require("axios");
    const articles = ref([]);
    const categories = ref([]);
    const defaultCategory = ref('none');


    const isLoading = ref(true);

    async function getArticles() {
      try {
        const response = await axios.get("/api/articles");
        articles.value = response.data;
        console.log(response.data);
        isLoading.value = false;
      } catch (error) {
        console.error(error);
      }
    }

    async function sortCategory() {
      try {
        const response = await axios.get("/api/articles/category/"+defaultCategory.value);
        articles.value = response.data;
        console.log(response.data);
        isLoading.value = false;
      } catch (error) {
        console.error(error);
      }
    }

    async function getCategories() {
      try {
        const response = await axios.get("/api/categories");
        categories.value = response.data;
        categories.value.unshift({
            id: 0,
            name: 'Toutes les catégories',
        })
        console.log(response.data);
      } catch (error) {
        console.error(error);
      }
    }

    onMounted(() => {
        getArticles();
        getCategories();
    });

    return { articles, isLoading, categories, defaultCategory, sortCategory };
  },
};
</script>

<style>
</style>
