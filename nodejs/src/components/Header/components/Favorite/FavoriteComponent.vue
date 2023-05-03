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
            <tr class="products">
              <td
                v-for="(product, i) in favoriteList.productsInFavorite"
                :key="i"
              >
                <div class="data">
                  <div class="image"></div>
                  <div class="info">
                    <div class="name">
                      {{ product.name }}
                    </div>
                    <div class="price">Цена: {{ product.price }}₽</div>
                  </div>
                </div>
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
  data() {
    return {
      showFavorite: false,
      favoriteList: {
        productsInFavorite: [
          {
            product_id: 1,
            name: "Футболка с принтом 'Меня бы кто в тонусе поддержал'",
            category: "Футболки",
            price: 399,
            image_path: "./data/9impulse.jpg",
          },
          {
            product_id: 3,
            name: "Джинсы черные",
            category: "Джинсы",
            price: 1999,
          },
        ],
      },
    };
  },
};
</script>

<style scoped>
.favorite {
  position: fixed;
  text-align: right;
  display: flex;
  right: 0;
  top: 0;
  background: white;
  z-index: 999;
  border: solid 1px black;
  border-radius: 10px;
  justify-content: flex-end;
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
  width: 100%;
}
.favorite .favorite-items. favoriteTable {
  width: 10em;
}
.products {
  display: flex;
  flex-direction: column;
  width: 100%;
}

td {
  margin-bottom: 2em;
  border: solid 1px black;
  border-radius: 10px;
}

.data {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  height: 200px;
  width: 90%;
}

.image {
  margin: 1em;
  border: solid 1px black;
  border-radius: 10px;
  width: 140px;
}

.info {
  padding: 0 0 1em 0;
  display: flex;
  justify-content: space-between;
  flex-direction: column;
  width: 70%;
}
</style>
