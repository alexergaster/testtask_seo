<template>
  <main class="py-8">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-center mb-6">Категорії</h2>

      <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8"
        v-if="categories.length"
      >
        <router-link
          v-for="category in categories"
          :key="category.id"
          :to="{ name: 'category', params: { id: category.id } }"
          class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow cursor-pointer"
        >
          <h3 class="text-xl font-semibold text-gray-800">
            {{ category.name }}
          </h3>
        </router-link>
      </div>
      <div v-else>Категорій немає</div>
    </div>
  </main>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { getCategories } from "../api";

const categories = ref([]);

onMounted(() => {
  getCategories().then((r) => {
    if (r.success) {
      categories.value = r.data;
    }
  });
});
</script>

<style scoped>
.grid div {
  transition: 0.5s all;
}
.grid div:hover {
  transform: translateY(-5px);
}
</style>
