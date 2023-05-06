<template xmlns="http://www.w3.org/1999/html">
  <div class="button">
  <button class="carousel-control" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="larr"> &larr; </span>
  </button>
  <button class="carousel-control" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="rarr"> &rarr; </span>
  </button>
  </div>
</template>

<script>
export default {
  name: "SliderButtonsComponent"
}
</script>

<style scoped>
 button {
   border-style: none;
   background-color: transparent;
   margin: 5%;
   margin-top: -150%;
 }
.button {
  margin-left: 47%;
  border-style: none;
}
</style>