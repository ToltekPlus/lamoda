<template>
  <li class="column is-4">
    <a>
      <ion-icon
        name="heart-outline"
        @click="showFavorite = !showFavorite"
      ></ion-icon>
    </a>
    <div class="favorite">
      <div class="favorite-items" v-show="showFavorite">
        <a>
          <ion-icon
            name="close"
            @click="showFavorite = !showFavorite"
          ></ion-icon>
        </a>
        <table class="favoriteTable">
          <tbody>
            <tr>
              <td v-for="(product, i) in favoriteList" :key="i">
                {{ product }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  name: "FavoriteComponent",
  props: ["favoriteList"],
  data() {
    return {
      showFavorite: false,
    };
  },
};
</script>

<style scoped>
.favorite {
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
.favorite .favorite-items {
  padding: 0 1em 2em 1em;
}
.favorite .favorite-items. favoriteTable {
  width: 10em;
}
</style>
