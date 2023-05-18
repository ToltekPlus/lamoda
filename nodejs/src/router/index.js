import { createRouter, createWebHistory } from "vue-router";

import {
  HomeView,
  WomenView,
  MenView,
  ChildrenView,
  FavoriteView,
  UserView,
} from "../views/main.js";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/women",
    name: "women",
    component: WomenView,
  },
  {
    path: "/men",
    name: "men",
    component: MenView,
  },
  {
    path: "/children",
    name: "children",
    component: ChildrenView,
  },
  {
    path: "/favorite",
    name: "favorite",
    component: FavoriteView,
  },
  {
    path: "/user",
    name: "user",
    component: UserView,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
