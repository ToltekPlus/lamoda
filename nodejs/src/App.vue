<template>
  <header-component />
  <favorite-button />
</template>

<script>
import HeaderComponent from "./components/Header/App.vue";
import FavoriteButton from "./components/Favorite/App.vue";

export default {
  name: "App",
  components: {
    HeaderComponent,
    FavoriteButton,
  },
};
</script>
