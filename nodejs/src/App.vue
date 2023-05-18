<template>
  <div class="container">
    <header-component />
    <catalog-component />
  </div>
</template>

<script>
import HeaderComponent from "./components/Header/App.vue";
import CatalogComponent from "./components/Catalog/App.vue";

export default {
  name: "App",
  components: {
    HeaderComponent,
    CatalogComponent,
  },
};
</script>
