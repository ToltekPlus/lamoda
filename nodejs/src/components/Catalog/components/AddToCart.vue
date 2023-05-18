<template>
  <div class="add-to-cart" @click.prevent="addToCart(productId)">
    <ion-icon name="cart-outline"></ion-icon>
    <span class="to-cart-text">В корзину</span>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "AddToCartComponent",
  props: ["productId"],
  methods: {
    ...mapActions(["ADD_TO_CART"]),

    addToCart(id) {
      this.ADD_TO_CART(id);
    },
  },
};
</script>
