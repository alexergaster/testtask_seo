<template>
  <div>
    <header>
      <HeaderItem />
    </header>
    <main>
      <slot />
    </main>
    <footer></footer>

    <CookieConsent />
  </div>
</template>

<script setup>
import HeaderItem from "../components/HeaderItem.vue";
import CookieConsent from "../components/CookieConsent.vue";
</script>
