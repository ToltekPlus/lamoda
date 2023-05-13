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
            <tr
              class="products"
              v-for="(product, i) in favoriteList.productsInFavorite"
              :key="i"
            >
              <td>
                <div class="data">
                  <div class="image">
                    <img src="../../data/9impulse.jpg" alt="" />
                  </div>
                  <div class="info">
                    <div class="name">
                      {{ product.name }}
                    </div>
                    <div class="price">Цена: {{ product.price }}₽</div>
                  </div>
                  <div class="delete_item">
                    <ion-icon
                      name="trash-bin-outline"
                      @click="deleteFromFavorite(i)"
                    ></ion-icon>
                  </div>
                </div>
              </td>
            </tr>
            <div
              class="empty-favorite"
              v-if="favoriteList.productsInFavorite.length === 0"
            >
              Вы не добавили товары в избранное!
            </div>
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
          },
          {
            product_id: 3,
            name: "Джинсы черные",
            category: "Джинсы",
            price: 1999,
          },
          {
            product_id: 2,
            name: "Усы импульса",
            category: "Джинсы",
            price: 1000,
          },
        ],
      },
    };
  },
  methods: {
    deleteFromFavorite(id) {
      let products = this.favoriteList.productsInFavorite;
      let data;
      for (let i = 0; i < products.length; i++) {
        data = products.filter(function (value, index) {
          if (index !== id) {
            return true;
          } else {
            return false;
          }
        });
      }
      this.favoriteList.productsInFavorite = data;
    },
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
  width: 700px;
}
.favorite .favorite-items. favoriteTable {
  width: 10em;
}

.favoriteTable {
  width: 100%;
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
  overflow: hidden;
}

.info {
  padding: 0 0 1em 0;
  margin: 1em;
  display: flex;
  justify-content: space-between;
  flex-direction: column;
  width: 70%;
}

.empty-favorite {
  display: flex;
  justify-content: center;
}
</style>
