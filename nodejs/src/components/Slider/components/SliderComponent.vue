<template>
  <div id="carouselExample" class="carousel slide column is-5">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCIMxFtpLOB2VmVbXGRnHmkKVbcl1Ks7yiag&usqp=CAU" class="d-block w-100" alt="...">
        <a class="about">Еще больше выгоды</a><br>
        <a class="secondabout">На новые коллекции</a>
      </div>
      <div class="carousel-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCIMxFtpLOB2VmVbXGRnHmkKVbcl1Ks7yiag&usqp=CAU" class="d-block w-100" alt="...">
        <a class="about">Еще больше выгоды</a><br>
        <a class="secondabout">На новые коллекции</a>
      </div>
      <div class="carousel-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCIMxFtpLOB2VmVbXGRnHmkKVbcl1Ks7yiag&usqp=CAU" class="d-block w-100" alt="...">
        <a class="about">Еще больше выгоды</a><br>
        <a class="secondabout">На новые коллекции</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SliderComponent",
  components: {},
  methods: {},
};

</script>
<style>
a {
  color: black;
  font-weight: 500;
}
a:hover{
  color: #7a7a7a;
}
.secondabout {
  color: #7a7a7a;
}
</style>