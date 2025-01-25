<template>
  <header class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Мій Магазин</h1>
      <nav>
        <ul class="flex space-x-4">
          <li>
            <router-link :to="{ name: 'products' }" class="hover:text-gray-400">
              Товари
            </router-link>
          </li>
          <li>
            <router-link
              :to="{ name: 'categories' }"
              class="hover:text-gray-400"
              >Категорії
            </router-link>
          </li>
          <li>
            <router-link
              :to="{ name: 'shoppingCard' }"
              class="relative hover:text-gray-400"
            >
              <i class="fa fa-shopping-cart text-xl"></i>
              <span
                class="absolute bottom-3 left-3 w-5 h-5 bg-blue-600 text-white text-xs rounded-full flex items-center justify-center"
              >
                {{ shoppingCartStore.count }}
              </span>
            </router-link>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <router-view></router-view>
</template>

<script setup>
import { useShoppingCartStore } from "../stores/shoppingCartStore";

const shoppingCartStore = useShoppingCartStore();
</script>
