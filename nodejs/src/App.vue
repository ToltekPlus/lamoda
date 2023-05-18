<template>
  <header-component />
  <router-view />
</template>

<script>
import HeaderComponent from "./components/Header/App.vue";

export default {
  name: "App",
  components: {
    HeaderComponent,
  },
};
</script>
