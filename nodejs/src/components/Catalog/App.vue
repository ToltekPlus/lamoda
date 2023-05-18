<template>
  <section class="popular-products columns is-multiline discount-products">
    <div class="column is-12">
      <h2>Популярные товары</h2>
    </div>

    <div class="popular-device">
      <product-component
        class="product column is-2 A"
        v-for="(product, i) in products"
        :key="i"
        :productItem="product"
      />
    </div>
  </section>
</template>

<script>
import { faker } from "@faker-js/faker";
import ProductComponent from "@/components/Catalog/components/Product.vue";

export default {
  name: "CatalogComponent",
  data() {
    return {
      products: [],
    };
  },
  methods: {
    setProduct() {
      this.products.push(new Product());
    },
    createProduct() {
      faker.helpers.multiple(this.setProduct, { count: 6 });
    },
  },
  created() {
    this.createProduct();
  },
  components: {
    ProductComponent,
  },
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
