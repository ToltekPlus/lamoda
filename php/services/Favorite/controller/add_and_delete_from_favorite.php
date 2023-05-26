<?php
class Favorite implements FavoriteInterface {
    private FavoriteDTOInterface $dto;

    public function __construct(FavoriteDTOInterface $dto) {
        $this->dto = $dto;
    }

    public function add_to_favorite($product) {
        if (!in_array($product, $this->dto->getFavorite())) {
            $favorite = $this->dto->getFavorite();
            $favorite[] = $product;
            $this->dto->setFavorite($favorite);
        }
    }

    public function remove_from_favorite($product) {
        $favorite = $this->dto->getFavorite();
        $k = array_search($product, $favorites);

        if ($k !== false) {
            unset($favorite[$k]);
            $this->dto->setFavorite($favorite);
        }
    }
}

$favoriteDTO = new FavoriteDTO();
$favorite = new Favorite($favoriteDTO);

// добавляем товары
$favorite->add_to_favorite("Мужская футболка белого цвета");
$favorite->add_to_favorite("Худи черного цвета");
$favorite->add_to_favorite("Кроссовки Puma белого цвета");
$favorite->add_to_favorite("Кепка Adidas черного цвета");

// удаляем товары
$favorite->remove_from_favorite("Кепка Adidas черного цвета");
