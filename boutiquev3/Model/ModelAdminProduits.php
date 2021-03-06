<?php
require_once 'Model/ModelAdmin.php';
class adminProduits extends admin
{
	protected $pdo;

//INSERT
public function insertProduct($nom,$description,$prix,$image_name, $stock, $date_ajout, $id_categorie, $id_region){
	$sql = "INSERT INTO produits SET nom=:nom, description=:description, prix = :prix, image_url=:image_url, stock = :stock, date_ajout = :date_ajout, id_categorie=:id_categorie, id_region=:id_region";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute([
		'nom' => $nom,
		'description' => $description,
		'prix' => $prix,
		'image_url' => $image_name,
		'stock' => $stock,
		'date_ajout' => $date_ajout,
		'id_categorie' => $id_categorie,
		'id_region' => $id_region
	]);
}
//SELECT ALL
public function selectAllProduct(){
	$sql = "SELECT * FROM produits";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute();
	while($products = $stmt->fetchAll(PDO::FETCH_ASSOC)){
		return $products;
	}
}
//UPDATE PRODUCT
public function updateProduct($id,$nom,$description,$prix,$image_url,$stock,$id_categorie,$id_region){
	$sql = "UPDATE produits SET nom=:nom, description=:description, prix=:prix, image_url=:image_url, stock=:stock,id_categorie=:id_categorie, id_region=:id_region WHERE id=:id";
	$stmt= $this->pdo->prepare($sql);
	$stmt->execute(compact('id','nom','description','prix','image_url','stock','id_categorie','id_region'));
}
//DELETE PRODUCT
public function deleteProduct($image_url){
	$sql = "DELETE FROM produits WHERE image_url = :image_url";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([
            'image_url' => $image_url
                       ]);
	}
}