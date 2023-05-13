<template>
  <section class="popular-products columns is-multiline discount-products">
    <div class="column is-12">
      <h2>Популярные товары</h2>

      <div v-for="(product, i) in CART" :key="i">
        {{ product.id }} => {{ product.count }}
        <span @click.prevent="deleteFromCart(product.id)">x</span>
      </div>
    </div>
    <div class="popular-device">
      <div
        class="product column is-2 A"
        v-for="(product, i) in products"
        :key="i"
      >
        <a href="">
          <picture>
            <img
              :src="product.image"
              :alt="products.product_name"
              class="cloth"
            />
          </picture>

          <div class="popular-product__price">{{ product.price }} ₽</div>

          <div class="popular-product__name">{{ products.produc_name }}</div>

          <div class="popular-product__category">
            {{ product.category_name }}
          </div>

          <div class="popular-product user-action">
            <div class="add-to-cart" @click.prevent="addToCart(product.id)">
              <ion-icon name="cart-outline"></ion-icon>
              <span class="to-cart-text">В корзину</span>
            </div>

            <div class="in-favourite">
              <ion-icon name="heart-outline"></ion-icon>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
</template>

<script>
import { faker } from "@faker-js/faker";
import { mapGetters, mapActions } from "vuex";

export default {
  name: "CatalogComponent",
  data() {
    return {
      products: [],
    };
  },
  computed: {
    ...mapGetters(["CART"]),
  },
  methods: {
    ...mapActions(["ADD_TO_CART", "DELETE_FROM_CART"]),
    setProduct() {
      this.products.push(new Product());
    },
    createProduct() {
      faker.helpers.multiple(this.setProduct, { count: 6 });
    },
    addToCart(id) {
      this.ADD_TO_CART(id);
    },
    deleteFromCart(id) {
      this.DELETE_FROM_CART(id);
    },
  },
  created() {
    this.createProduct();
  },
  components: {},
};

class Product {
  constructor() {
    (this.id = faker.datatype.uuid()),
      (this.style_id = faker.datatype.uuid()),
      (this.company_id = faker.datatype.uuid()),
      (this.material_id = faker.datatype.uuid()),
      (this.design_color_id = faker.datatype.uuid()),
      (this.gender_id = Math.random()),
      (this.subcategory_id = faker.datatype.uuid()),
      (this.description = faker.lorem.word(5)),
      (this.product_name = faker.lorem.word(10)),
      (this.price = faker.number.int(10000)),
      (this.category_name = faker.lorem.word(8)),
      (this.image = faker.image.url(1000));
  }
}
</script>
