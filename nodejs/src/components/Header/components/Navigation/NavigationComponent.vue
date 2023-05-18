<template>
  <ul class="column is-4">
    <li v-for="(gender, index) in navigationList" :key="index">
      <router-link :to="gender.link">{{ gender.text }}</router-link>
    </li>
  </ul>
</template>

<script>
export default {
  name: "NavigationComponent",
  props: ["navigationList"],
};
</script>
