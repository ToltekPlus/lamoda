<template>
  <li class="column is-4">
    <a
      ><ion-icon name="heart-outline" @click="showCart = !showCart"></ion-icon
    ></a>
    <modal
      :state="Favorite"
      :typeState="'favorite'"
      v-model:showModal="showCart"
      v-show="showCart"
    />
  </li>
</template>

<script>
import { mapGetters } from "vuex";
import Modal from "@/components/Header/components/Modal/Modal.vue";
import Favorite from "@/store/modules/favorite";

export default {
  name: "FavoriteComponent",
  components: { Modal },
  data() {
    return {
      showCart: false,
    };
  },
  computed: {
    Favorite() {
      return Favorite;
    },
    ...mapGetters["FAVORITE"],
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
