<template>
  <div class="search column is-8">
    <p class="control has-icons-left">
      <input
        class="input is-hovered"
        type="search"
        placeholder="Найти товары"
      />
      <button @click="search(prodsList)">Найти</button>
      <span class="icon is-small is-left">
        <ion-icon name="search-outline" class="search-icon"></ion-icon>
      </span>
    </p>
  </div>
</template>

<script>
export default {
  name: "SearchComponent",
  props: ["prodsList"],
  data() {
    return {
    };
  },
  methods: {
    search(list){
      let searchItem = document.querySelector("input"); // Забираем input
      const sortedList = []
      for (const item of list.testSearch) { // Перебираем объект
        if(item.product_name.toLowerCase().includes(searchItem.value.toLowerCase())){ // Преобразуем товары и значение input в нижний регистр и ищем совпадения
          sortedList.push(item.id) // Записываем в массив ключи
        }
      }
      console.log(sortedList);
    }
  }
};
</script>


