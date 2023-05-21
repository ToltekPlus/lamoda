<template>
  <header class="columns is-vcentered">
    <logotype />

    <div class="navbar column is-7">
      <div class="nav-category columns">
        <navigation :navigationList="navigationList" />
        <search :prodsList="prodsList" />
      </div>
    </div>

    <div class="user-data column is-2">
      <ul class="columns">
        <user />
        <favorite />
        <cart />
      </ul>
    </div>
  </header>
</template>

<script>
import genders from "./data/navigation.json";
import Prods from "./data/testSearch.json";

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
      navigationList: genders,
      prodsList: Prods,
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
