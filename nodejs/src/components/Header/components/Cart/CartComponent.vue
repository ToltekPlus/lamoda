<template>
  <li class="column is-4">
    <a>
      <ion-icon name="cart-outline" @click="showCart = !showCart"></ion-icon>
    </a>
    <div class="cart">
      <div class="cart-items" v-show="showCart">
        <span @click="testing()">OLOLOLO</span>
        <a>
          <ion-icon name="close" @click="showCart = !showCart"></ion-icon>
        </a>
        <table class="cartTable">
          <tbody>
            <tr>
              <td v-for="(item, i) in list" :key="i" v-if="list !== null">
                {{ item }}
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
import axios from "axios";

export default {
  name: "CartComponent",
  props: ["cartList"],
  data() {
    return {
      showCart: false,
      list: null
    };
  },
  methods: {
    async testing() {
      axios
        .get("http://localhost:8080")
        .then((res) => {
          this.list = res.data;
        })
        .catch((err) => {
          console.log(err.response);
        });
    },
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
