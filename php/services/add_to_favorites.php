<?php
//интерфейс, как требовал Сергей Павлович, в него входят функции добавления и удаления товара из избранного
interface FavoritesInterface {
public function add_to_favorites($product);
public function remove_from_favorites($product);
}
//дальше сам класс избранного
//добавление в избранное
class Favorites implements FavoritesInterface {
private $favorites = [];
public function add_to_favorites($product) {
if (!in_array($product, $this->favorites)){
$this->favorites[] = $product;
}
}
//удаление из избранного
public function remove_from_favorites($product){
$k = array_search($product, $this->favorites);
if ($k !== false){
unset($this->favorites[$key]);
}
}
}
$favorites = new Favorites();
//добавляем товары
$favorites->add_to_favorites("Мужская футболка белого цвета");
$favorites->add_to_favorites("Худи черного цвета");
$favorites->add_to_favorites("Кроссовки Puma белого цвета");
$favorites->add_to_favorites("Кепка Adidas черного цвета");

//удаляем товары
$favorites->remove_from_favorites("Кепка Adidas черного цвета");
