<template>
  <header class="columns is-vcentered">
    <logotype />

    <div class="navbar column is-7">
      <div class="nav-category columns">
        <navigation :navigationList="navigationList" />
        <search />
      </div>
    </div>

    <div class="user-data column is-2">
      <ul class="columns">
        <user />
        <favorite />
        <cart :cartList="cartList" />
      </ul>
    </div>
  </header>
</template>

<script>
import cart from "./data/cart.json";
import genders from "./data/navigation.json";

import Logotype from "./components/Logotype/LogotypeComponent.vue";
import Navigation from "./components/Navigation/NavigationComponent.vue";
import Search from "./components/Search/SearchComponent.vue";
import User from "./components/User/UserComponent.vue";
import Favorite from "./components/Favorite/FavoriteComponent.vue";
import Cart from "./components/Cart/CartComponent.vue";

export default {
  name: "HeaderComponent",
  data() {
    return {
      cartList: cart,
      navigationList: genders,
    };
  },
  components: {
    Logotype,
    Navigation,
    Search,
    User,
    Favorite,
    Cart,
  },
};
</script>
