<template>
  <div>
    <div
      class="
        min-h-screen
        bg-slate-200
        pt-1
        flex flex-col
        relative
        overflow-hidden
        sm:py-12
      "
    >
      <span
        class="
          border
          text-4xl text-black
          px-6
          pt-10
          pb-8
          bg-white
          w-4/5
          mx-auto
          rounded-t-md
          sm:px-10
        "
        >Modifier L'article</span
      >
      <div
        class="
          border
          relative
          px-4
          pt-7
          pb-8
          bg-white
          shadow-xl
          w-4/5
          mx-auto
          sm:px-10
          rounded-b-md
        "
      >
        <form action="">
          <label for="" class="block">Titre</label>
          <input
            type="text"
            class="border w-full h-10 px-3 mb-5 rounded-md"
            name="title"
          />
          <label for="" class="block">Catégorie</label>
            <select name="category_id" class="border w-full h-10 px-3 mb-5 rounded-md">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>

          <label for="" class="block">Contenu</label>
          <textarea style="resize: none" class="w-full rounded-md border" name="content" cols="30" rows="10"></textarea>
          <button
            class="
              mt-5
              bg-green-500
              hover:bg-blue-700
              shadow-xl
              text-white
              uppercase
              text-sm
              font-semibold
              px-14
              py-3
              rounded
            "
          >
            Login
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>
