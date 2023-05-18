//import axios from "axios";

export default {
  getters: {
    CART(state) {
      return state.cart;
    },
  },
  mutations: {
    ADD_TO_CART_MUTATION(state, product) {
      const find_product_in_cart = state.cart.find(
        (item) => item.id === product
      );

      if (find_product_in_cart) {
        state.cart.map((item) => {
          if (item.id === find_product_in_cart.id) {
            item.count++;
          }
        });
      }

      if (!find_product_in_cart) {
        let obj = {
          id: product,
          count: 1,
        };

        state.cart.push(obj);
      }
    },

    DELETE_FROM_CART_MUTATION(state, product) {
      let filtered_product = state.cart.findIndex(
        (item) => item.id === product
      );

      state.cart.splice(filtered_product, 1);
    },
  },
  actions: {
    ADD_TO_CART(ctx, data) {
      ctx.commit("ADD_TO_CART_MUTATION", data);
      /*
      axios
        .get("/api/v1/add-to-cart")
        .then((result) => {
          ctx.commit("ADD_TO_CART_MUTATION", result.data);
        })
        .catch((error) => {
          console.log(error);
        });*/
    },

    DELETE_FROM_CART(ctx, data) {
      ctx.commit("DELETE_FROM_CART_MUTATION", data);
    },
  },
  state: {
    cart: [],
  },
};
