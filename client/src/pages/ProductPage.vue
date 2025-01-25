<template>
  <main class="py-8">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row bg-white p-6 rounded-lg shadow-md">
        <div class="w-full md:w-1/2 mb-4 md:mb-0">
          <img
            :src="product.image"
            alt="Product Image"
            class="w-full h-full object-cover rounded-lg"
          />
        </div>

        <div class="md:ml-6 w-full md:w-1/2">
          <h1 class="text-3xl font-bold mb-4">{{ product.name }}</h1>
          <p class="text-lg text-gray-600 mb-4">{{ product.description }}</p>
          <p class="text-2xl font-semibold text-gray-800 mb-4">
            {{ product.price }} ₴
          </p>
          <p class="text-sm text-gray-500 mb-6">
            Додано: {{ product.created_at }}
          </p>

          <button
            :disabled="isProductInCart"
            class="mt-2 px-4 py-2 bg-blue-800 text-white rounded-lg cursor-pointer hover:bg-blue-500 transition duration-300 disabled:opacity-50"
            @click="addToCart(product)"
          >
            {{ !isProductInCart ? "Додати в корзину" : "Вже в корзині" }}
          </button>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import { getProduct } from "../api";
import { useRoute } from "vue-router";
import { useShoppingCartStore } from "../stores/shoppingCartStore";

const route = useRoute();
const shoppingCartStore = useShoppingCartStore();

const product = ref({});
const cartProducts = computed(() => shoppingCartStore.cart);

const addToCart = (product) => {
  shoppingCartStore.addProduct(product);
};

const isProductInCart = computed(() => {
  return cartProducts.value.some((item) => item.id === product.value.id);
});

onMounted(() => {
  getProduct(route.params.id).then((r) => (product.value = r.data));
});
</script>
