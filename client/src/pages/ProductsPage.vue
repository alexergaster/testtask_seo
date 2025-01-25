<template>
  <main class="py-8">
    <div class="container mx-auto">
      <div class="flex flex-wrap mb-6 space-x-4">
        <input
          type="text"
          v-model="filterParam.search"
          placeholder="Пошук..."
          class="border p-2 rounded-lg w-full md:w-1/3"
        />
        <div class="flex space-x-4">
          <input
            type="number"
            v-model="filterParam.min_price"
            placeholder="Мін. ціна"
            class="border p-2 rounded-lg"
          />
          <input
            type="number"
            v-model="filterParam.max_price"
            placeholder="Макс. ціна"
            class="border p-2 rounded-lg"
          />
        </div>
        <div class="flex space-x-4">
          <input
            type="date"
            v-model="filterParam.start_date"
            placeholder="Дата початку"
            class="border p-2 rounded-lg"
          />
          <input
            type="date"
            v-model="filterParam.end_date"
            placeholder="Дата кінця"
            class="border p-2 rounded-lg"
          />
        </div>
        <select v-model="filterParam.sort_by" class="border p-2 rounded-lg">
          <option value="asc">А-Я</option>
          <option value="desc">Я-А</option>
        </select>
      </div>

      <div
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"
        v-if="products.length"
      >
        <ProductCard
          v-for="product in products"
          :key="product.id"
          :product="product"
        />
      </div>
      <div v-else>Товарів немає :(</div>

      <div class="mt-6">
        <button
          @click="goPrevPage"
          :disabled="!prevPage || !products.length"
          class="px-4 py-2 bg-gray-800 text-white rounded-lg disabled:opacity-50 mr-2"
        >
          Попередня
        </button>
        <button
          @click="goNextPage"
          :disabled="!nextPage || !products.length"
          class="px-4 py-2 bg-gray-800 text-white rounded-lg disabled:opacity-50"
        >
          Наступна
        </button>
      </div>
    </div>
  </main>
</template>

<script setup>
import { ref, onMounted, watch, defineProps } from "vue";
import { useRoute } from "vue-router";
import { getProducts, goLink } from "../api";
import ProductCard from "../components/ProductCard.vue";

const products = ref([]);
const prevPage = ref("");
const nextPage = ref("");
const route = useRoute();

const filterParam = ref({
  search: "",
  min_price: "",
  max_price: "",
  start_date: "",
  end_date: "",
  sort_by: "",
  category_id: route.params.id || null,
});

watch(
  () => route.params.id,
  (newCategoryId) => {
    filterParam.value.category_id = newCategoryId || null;
    fetchProducts();
  }
);

watch(
  filterParam,
  () => {
    console.log(filterParam.value);

    fetchProducts();
  },
  { deep: true }
);

const fetchProducts = () => {
  getProducts(filterParam.value).then((r) => updateData(r));
};

const goNextPage = () => {
  goLink(nextPage.value).then((r) => updateData(r));
};

const goPrevPage = () => {
  goLink(prevPage.value).then((r) => updateData(r));
};

onMounted(() => {
  getProducts(filterParam.value).then((r) => updateData(r));
});

const updateData = (data) => {
  if (data.success) {
    products.value = data.data.data;
    prevPage.value = data.data.links.prev;
    nextPage.value = data.data.links.next;
  }
};
</script>
