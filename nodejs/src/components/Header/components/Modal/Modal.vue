<template>
  <div>
    <div class="modal is-active">
      <div class="modal-background"></div>
      <div class="modal-content">
        <div class="box">
          <div v-if="Object.keys(products)[0] === stateCategory">
            <div v-for="(product, i) in products" :key="i">
              <div v-for="(item, key) in product" :key="key">
                <div class="block">
                  <span class="tag">
                    <div>Продукт ID: {{ item.id }}</div>
                    <div v-if="stateCategory === 'cart'">
                      Количество: {{ item.count }}
                    </div>

                    <button
                      class="delete is-small"
                      @click="deleteFromState(item.id)"
                    ></button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div v-if="!products[stateCategory].length">
            <h1>{{ defaultMessage }}</h1>
          </div>
        </div>
      </div>
      <button
        class="modal-close"
        @click="$emit('update:showModal', false)"
      ></button>
    </div>
  </div>
</template>

<script>
export default {
  name: "ModalComponent",
  props: ["state", "typeState"],
  data() {
    return {
      stateCategory: this.typeState,
      products: this.state.state,
      dict: {
        CART: "Корзина пуста",
        FAVORITE: "Избранное отсутствует",
      },
      defaultMessage: "",
    };
  },
  created() {
    Object.keys(this.dict).find((key) => {
      if (key === this.stateCategory.toUpperCase()) {
        this.defaultMessage = this.dict[key];
      }
    });
  },
  methods: {
    deleteFromState(id) {
      this.$store.dispatch(
        "DELETE_FROM_" + this.stateCategory.toUpperCase(),
        id
      );
    },
  },
};
</script>

<style scoped>
.modal {
  z-index: 9999;
}
</style>
