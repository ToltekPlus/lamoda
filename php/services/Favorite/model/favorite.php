<?php
class FavoriteDTO implements FavoriteDTOInterface {
    private PDO $db;
    
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getFavorite(): array {
        $stmt = $this->db->query("SELECT product FROM favorite");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function setFavorite(array $favorite) {
        $this->db->exec("DELETE FROM favorite");
        foreach ($favorite as $product) {
            $stmt = $this->db->prepare("INSERT INTO favorite (product) VALUES (?)");
            $stmt->execute([$product]);
        }
    }
}
