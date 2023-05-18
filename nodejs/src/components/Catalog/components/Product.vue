<template>
  <div>
    <a href="">
      <picture>
        <img
          :src="productItem.image"
          :alt="productItem.product_name"
          class="cloth"
        />
      </picture>

      <div class="popular-product__price">{{ productItem.price }} ₽</div>

      <div class="popular-product__name">{{ productItem.product_name }}</div>

      <div class="popular-product__category">
        {{ productItem.category_name }}
      </div>

      <div class="popular-product user-action">
        <add-to-cart :productId="productItem.id" />
        <add-to-favorite-component :product-id="productItem.id" />
      </div>
    </a>
  </div>
</template>

<script>
import AddToCart from "@/components/Catalog/components/AddToCart.vue";
import AddToFavoriteComponent from "@/components/Catalog/components/AddToFavorite.vue";

export default {
  name: "ProductComponent",
  components: { AddToFavoriteComponent, AddToCart },
  props: ["productItem"],
  computed: {},
  methods: {},
};
</script>
