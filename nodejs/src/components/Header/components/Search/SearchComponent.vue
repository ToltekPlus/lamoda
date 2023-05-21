<template>
  <div class="search column is-8">
    <p class="control has-icons-left">
      <input class="input" type="search" v-model="searchText" placeholder="Найти товары" />
      <span class="icon is-small is-right">
        <ion-icon name="search-outline" class="search-icon"></ion-icon>
      </span>
    </p>
    <div class="resault" v-show="showResault">
        <p v-if="this.searchResault.length > 0">
            {{ searchResault }}
        </p>
        <p v-else>
            Товары не найдены.
        </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "SearchComponent",
  props: ["prodsList"],
  data() {
    return {
      showResault: false,
        searchText:'',
        searchResault: ''

    }
  },
    watch: {
        searchText() {
          if(this.searchText.trim().length >= 3){
              this.showResault = true;
              this.search();
          } else {
              this.showResault = false;
          }
      }
    },
  methods: {
    search() {
      let searchItem = document.querySelector("input"); // Забираем input
      const sortedList = [];
      for (const item of this.prodsList.testSearch) {
        // Перебираем объект
        if (
          item.product_name
            .toLowerCase()
            .includes(searchItem.value.toLowerCase())
        ) {
          // Преобразуем товары и значение input в нижний регистр и ищем совпадения
          sortedList.push(item.id); // Записываем в массив ключи
        }
      }
      this.searchResault = sortedList;
    },
  },
};
</script>

<style>
.control .input {
  padding-left: 11.75px !important;
  padding-right: 2.5em;
}
.icon {
  right: 0;
}
.resault {
  position: fixed;
  height: 300px;
  background-color: #F1F1F1;
  box-shadow: inset 0 0.0625em 0.125em rgba(10,10,10,0.05);
  width: auto;
}
</style>
