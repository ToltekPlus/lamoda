<template>
  <div class="search column is-8">
    <p class="control has-icons-left">
      <input
        class="input is-hovered"
        type="search"
        placeholder="Найти товары"
      />
      <span class="icon is-small is-left">
        <ion-icon name="search-outline" class="search-icon"></ion-icon>
      </span>
    </p>
  </div>
</template>

<script>
export default {
  name: "SearchComponent",
};
</script>
