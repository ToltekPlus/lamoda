<template>
  <li class="column is-4">
    <a>
      <ion-icon name="cart-outline" @click="showCart = !showCart"></ion-icon>
    </a>
    <modal
      :state="Cart"
      :typeState="'cart'"
      v-model:showModal="showCart"
      v-show="showCart"
    />
  </li>
</template>

<script>
import { mapGetters } from "vuex";
import Modal from "@/components/Header/components/Modal/Modal.vue";
import Cart from "@/store/modules/cart";

export default {
  name: "CartComponent",
  components: { Modal },
  data() {
    return {
      showCart: false,
    };
  },
  computed: {
    Cart() {
      return Cart;
    },
    ...mapGetters["CART"],
  },
  methods: {
    /*
    async testing() {
      axios
        .get("http://localhost:8080")
        .then((res) => {
          this.list = res.data;
        })
        .catch((err) => {
          console.log(err.response);
        });
    },*/
  },
};
</script>

<style scoped>
ion-icon {
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
</style>
