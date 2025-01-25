<template>
  <main class="py-8">
    <div class="container mx-auto" v-if="products.length">
      <div class="flex mb-5">
        Товарів на суму
        <p class="ml-2 font-semibold">{{ productsPrice }} ₴</p>
      </div>
      <div
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"
      >
        <div
          class="bg-white p-4 rounded-lg shadow-md"
          v-for="product in products"
          :key="product.id"
        >
          <router-link
            class="cursor-pointer"
            :to="{ name: 'product', params: { id: product.id } }"
          >
            <img
              :src="product.image"
              alt=""
              class="w-full h-48 object-cover rounded-lg mb-4"
            />
          </router-link>
          <h3 class="font-bold text-lg">{{ product.name }}</h3>
          <p class="text-gray-500 text-ellipsis overflow-hidden line-clamp-5">
            {{ product.description }}
          </p>
          <p class="mt-2">
            Категорія:
            <router-link
              :to="{ name: 'category', params: { id: product.category.id } }"
              class="font-semibold underline"
              >{{ product.category.name }}</router-link
            >
          </p>
          <p class="mt-2 font-semibold">{{ product.price }} ₴</p>
          <button
            class="mt-2 px-4 py-2 bg-green-800 text-white rounded-lg cursor-pointer hover:bg-green-500 transition duration-300"
            @click="removeCart(product.id)"
          >
            Видалити з корзини
          </button>
        </div>
      </div>
      <div class="flex justify-center">
        <button
          class="mt-8 px-4 py-2 bg-yellow-600 text-white rounded-lg cursor-pointer hover:bg-yellow-800 transition duration-300"
          @click="removeAll"
        >
          Видалити з корзини
        </button>
      </div>
    </div>
    <div v-else>Товарів немає :(</div>
  </main>
</template>

<script setup>
import { ref, onMounted, watch, computed } from "vue";
import { useShoppingCartStore } from "../stores/shoppingCartStore";

const shoppingCartStore = useShoppingCartStore();

const products = ref([]);

const removeAll = () => {
  shoppingCartStore.removeAll();
  products.value = shoppingCartStore.cart;
};

const removeCart = (id) => {
  shoppingCartStore.removeProduct(id);
  products.value = shoppingCartStore.cart;
};

const productsPrice = computed(() => {
  return products.value.reduce((total, product) => total + product.price, 0);
});

onMounted(() => {
  products.value = shoppingCartStore.cart;
});
</script>

<style scoped>
.text-ellipsis {
  overflow: hidden;
  text-overflow: ellipsis;
}

.line-clamp-5 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
}
</style>
