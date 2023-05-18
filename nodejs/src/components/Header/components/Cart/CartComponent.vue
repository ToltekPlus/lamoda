<template>
  <li class="column is-4">
    <a>
      <ion-icon name="cart-outline" @click="showCart = !showCart"></ion-icon>
    </a>
    <div class="cart">
      <div class="cart-items" v-show="showCart">
        <a>
          <ion-icon name="close" @click="showCart = !showCart"></ion-icon>
        </a>
        <table class="cartTable">
          <tbody>
            <tr>
              <td v-for="(product, i) in cartList" :key="i">
                {{ product }}
              </td>
            </tr>
          </tbody>
        </table>
        <h4 class="cartSubTotal" v-show="showCart">0</h4>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  name: "CartComponent",
  props: ["cartList"],
  data() {
    return {
      showCart: false,
    };
  },
};
</script>

<style scoped>
.cart {
  position: fixed;
  text-align: right;
  right: 0;
  top: 0;
  background: #c9c9c9;
  z-index: 999;
}
ion-icon {
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.cart .cart-items {
  padding: 0 1em 2em 1em;
}
.cart .cart-items .cartTable {
  width: 10em;
}
</style>
