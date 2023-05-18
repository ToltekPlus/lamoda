import Vuex from "vuex";

import cart from "./modules/cart";
import favorite from "./modules/favorite";

export default new Vuex.Store({
  modules: {
    cart,
    favorite,
  },
});
