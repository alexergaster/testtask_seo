import { defineStore } from "pinia";

export const useShoppingCartStore = defineStore("shoppingCart", {
  state: () => ({
    cart: JSON.parse(localStorage.getItem("shoppingCard")) || [],
  }),
  getters: {
    count: (state) => state.cart.length,
  },
  actions: {
    addProduct(product) {
      if (!this.cart.some((item) => item.id === product.id)) {
        this.cart.push(product);
        this.updateLocalStorage();
      }
    },
    removeProduct(id) {
      this.cart = this.cart.filter((product) => product.id !== id);
      this.updateLocalStorage();
    },
    removeAll() {
      this.cart = [];
      this.updateLocalStorage();
    },
    updateLocalStorage() {
      localStorage.setItem("shoppingCard", JSON.stringify(this.cart));
    },
  },
});
