<template>
  <header-component />
  <Slider />
</template>

<script>
import HeaderComponent from "./components/Header/App.vue";
import Slider from "./components/Slider/App.vue";

export default {
  name: "App",
  components: {
    HeaderComponent,
    Slider,
  },
};
</script>
