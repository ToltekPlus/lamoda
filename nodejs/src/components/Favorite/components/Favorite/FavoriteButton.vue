<template>
  <li class="column is-4"></li>
  <div v-for="(product, i) in products.productsList" :key="i">
    <span v-if="product.favorite === true" @click="deleteFromFavorite(i)">
      <ion-icon name="heart-outline"></ion-icon>
    </span>
    <span v-else @click="addToFavorite(i)">
      <ion-icon name="heart-dislike-outline"></ion-icon>
    </span>
  </div>
  <p v-for="(product, i) in products.productsList" :key="i">
    {{ product }}
  </p>
</template>

<script>
//import { isProxy, toRaw } from 'vue';
export default {
  name: "FavoriteButton",
  data: function () {
    return {
      products: {
        productsList: [
          {
            product_id: 0,
            favorite: false,
          },
          {
            product_id: 1,
            favorite: true,
          },
          {
            product_id: 4,
            favorite: false,
          },
        ],
      },
    };
  },
  methods: {
    addToFavorite: function (id) {
      this.products.productsList[id].favorite = true;
    },
    deleteFromFavorite: function (id) {
      this.products.productsList[id].favorite = false;
    },
  },
};
</script>
<style scoped></style>
