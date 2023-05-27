import { createApp } from "vue";
import store from "./store/index";
import App from "./App.vue";

createApp(App).use(store).mount("#app");

console.log(" /\\_/\\\n" + "( o.o )\n" + " > ^ <\n" + "приветики");
