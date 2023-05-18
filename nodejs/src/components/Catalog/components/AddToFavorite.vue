<template>
  <div class="in-favourite">
    <ion-icon
      name="heart-outline"
      @click.prevent="addToFavorite(productId)"
    ></ion-icon>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "AddToFavoriteComponent",
  props: ["productId"],
  methods: {
    ...mapActions(["ADD_TO_FAVORITE"]),

    addToFavorite(id) {
      this.ADD_TO_FAVORITE(id);
    },
  },
};
</script>
