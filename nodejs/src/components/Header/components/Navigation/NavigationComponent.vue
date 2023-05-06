<template>
  <ul class="column is-4">
    <li v-for="(gender, index) in navigationList" :key="index">
      <a :href="gender.link">{{ (gender.text, gender.link) }}</a>
    </li>
  </ul>
</template>

<script>
export default {
  name: "NavigationComponent",
  props: ["navigationList"],
};
</script>
