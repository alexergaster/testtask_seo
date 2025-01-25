<template>
  <div
    v-if="!cookieConsent"
    class="fixed bottom-0 left-0 w-full bg-gray-800 text-white p-4 text-center"
  >
    <div class="container mx-auto flex justify-between items-center">
      <p class="text-sm">
        Цей сайт використовує кукі для покращення роботи. Продовжуючи, ви
        погоджуєтесь на використання кукі.
      </p>
      <button
        @click="acceptCookies"
        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
      >
        Погоджуюсь
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const cookieConsent = ref(false);

onMounted(() => {
  cookieConsent.value = localStorage.getItem("cookieConsent") === "true";
});

const acceptCookies = () => {
  localStorage.setItem("cookieConsent", "true");
  cookieConsent.value = true;
};
</script>

<style scoped>
.fixed {
  position: fixed;
}

.bottom-0 {
  bottom: 0;
}

.left-0 {
  left: 0;
}

.bg-gray-800 {
  background-color: #2d2d2d;
}

.text-white {
  color: #ffffff;
}

.p-4 {
  padding: 1rem;
}

.text-center {
  text-align: center;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

.mx-auto {
  margin-left: auto;
  margin-right: auto;
}

.flex {
  display: flex;
}

.justify-between {
  justify-content: space-between;
}

.items-center {
  align-items: center;
}

.text-sm {
  font-size: 0.875rem;
}

.bg-blue-500 {
  background-color: #3b82f6;
}

.text-white {
  color: white;
}

.px-4 {
  padding-left: 1rem;
  padding-right: 1rem;
}

.py-2 {
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.rounded {
  border-radius: 0.375rem;
}

.hover\:bg-blue-600:hover {
  background-color: #2563eb;
}
</style>
