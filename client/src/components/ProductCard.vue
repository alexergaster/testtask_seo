<template>
  <div class="bg-white p-4 rounded-lg shadow-md">
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
      :disabled="isProductInCart"
      class="mt-2 px-4 py-2 bg-blue-800 text-white rounded-lg cursor-pointer hover:bg-blue-500 transition duration-300 disabled:opacity-50"
      @click="addToCart(product)"
    >
      {{ !isProductInCart ? "Додати в корзину" : "Вже в корзині" }}
    </button>
  </div>
</template>

<script setup>
import { ref, defineProps, computed } from "vue";
import { useShoppingCartStore } from "../stores/shoppingCartStore";

const shoppingCartStore = useShoppingCartStore();
const cartProducts = computed(() => shoppingCartStore.cart);

const props = defineProps({
  product: {
    type: Object,
    required: true,
  },
});

const addToCart = (product) => {
  shoppingCartStore.addProduct(product);
};

const isProductInCart = computed(() => {
  return cartProducts.value.some((item) => item.id === props.product.id);
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
