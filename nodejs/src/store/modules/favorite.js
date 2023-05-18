//import axios from "axios";

export default {
  getters: {
    FAVORITE(state) {
      return state.favorite;
    },
  },
  mutations: {
    ADD_TO_FAVORITE_MUTATION(state, product) {
      const find_product_in_favorite = state.favorite.find(
        (item) => item.id === product
      );

      if (find_product_in_favorite) {
        return true;
      }

      if (!find_product_in_favorite) {
        let obj = {
          id: product,
        };

        state.favorite.push(obj);
      }
    },

    DELETE_FROM_FAVORITE_MUTATION(state, product) {
      let filtered_product = state.favorite.findIndex(
        (item) => item.id === product
      );

      state.favorite.splice(filtered_product, 1);
    },
  },
  actions: {
    ADD_TO_FAVORITE(ctx, data) {
      ctx.commit("ADD_TO_FAVORITE_MUTATION", data);
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

    DELETE_FROM_FAVORITE(ctx, data) {
      ctx.commit("DELETE_FROM_FAVORITE_MUTATION", data);
    },
  },
  state: {
    favorite: [],
  },
};
