<template>
  <div>
    <nav
      class="
        font-sans
        flex flex-col
        text-center
        content-center
        sm:flex-row sm:text-left sm:justify-between
        py-2
        px-6
        bg-white
        shadow
        sm:items-baseline
        w-full
      "
    >
      <div class="mb-2 sm:mb-0 flex flex-row">
        <div>
          <router-link
            to="/"
            class="
              text-2xl
              no-underline
              text-blue-500
              hover:text-blue-dark
              font-sans font-bold
            "
            >Bloggo</router-link
          ><br />
          <span class="text-xs text-grey-dark">Tailwind Components</span>
        </div>
      </div>

      <div class="sm:mb-0 self-center">
        <router-link
          class="text-md no-underline text-black hover:text-blue-dark ml-2 px-1"
          v-for="link in links"
          :to="link.link"
          :key="link.link"
          >{{ link.name }}</router-link
        >
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Header",
  setup() {
    const links = [
      {
        name: "Accueil",
        link: "/",
      },
      {
        name: "Nouvel Article",
        link: "/add-article",
      },
    ];

    return { links };
  },
};
</script>

<style>
</style>
