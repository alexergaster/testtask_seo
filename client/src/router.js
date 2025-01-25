import { createRouter, createWebHistory } from "vue-router";
import DefaultLayout from "./layouts/DefaultLayout.vue";
import ProductsPage from "./pages/ProductsPage.vue";
import ProductPage from "./pages/ProductPage.vue";
import CategoriesPage from "./pages/CategoriesPage.vue";
import ShoppingCard from "./pages/ShoppingCard.vue";

const routes = [
  {
    path: "/",
    component: DefaultLayout,
    children: [
      {
        path: "",
        name: "products",
        component: ProductsPage,
      },
      {
        path: "products/category/:id",
        name: "category",
        component: ProductsPage,
      },
      {
        path: "categories",
        name: "categories",
        component: CategoriesPage,
      },
      {
        path: "shoppingCard",
        name: "shoppingCard",
        component: ShoppingCard,
      },
      {
        path: "product/:id",
        name: "product",
        component: ProductPage,
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
