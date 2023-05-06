<template>
  <div class="carousel column is-12">
  <slider-component />
  <slider-buttons-component />
  </div>
  <div class="carousel2 column is-5">
    <slider-component />
    <slider-buttons-component />
  </div>
  <div class="carousel3 column is-5">
    <slider-component />
    <slider-buttons-component />
  </div>
</template>

<script>
import SliderButtonsComponent from "@/components/Slider/components/SliderButtons";
import SliderComponent from "@/components/Slider/components/SliderComponent";
export default {
  name: "Slider",
  components: { SliderComponent, SliderButtonsComponent },
};
</script>

<style scoped>
.carousel {
  margin-left: 10%;
}
.carousel2 {
  margin-left: 57%;
  margin-top: -34%;
}
.carousel3 {
  margin-top: -2%;
  margin-left: 57%;
}
</style>
