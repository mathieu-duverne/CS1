<?php
require_once 'Model/Model.php';
class product extends Model
{
        protected $pdo;
    //INNER JOIN ALL produits avec categorie et region
public function selectAllProducts($start,$nbrarticle){
	$sql = "SELECT produits.id,produits.nom,produits.description,produits.prix,produits.image_url,produits.stock,categories.nom_categorie,regions.nom_region
			FROM produits 
			INNER JOIN categories ON produits.id_categorie = categories.id
			INNER JOIN regions ON produits.id_region = regions.id
			ORDER BY id DESC LIMIT ".$start.",".$nbrarticle."
			";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute();
	while($allproducts = $stmt->fetchAll(PDO::FETCH_ASSOC)){
		return $allproducts;
	    }
    }
//SELECT PRODUCT WHERE CATEGORIE
public function selectProductWhereCategories($start,$nbrarticle,$id_categorie){
	$sql="SELECT produits.id,produits.nom,produits.description,produits.prix,produits.image_url,produits.stock,categories.nom_categorie,regions.nom_region 
		  FROM produits,categories,regions 
		  WHERE produits.id_categorie = :id_categorie
		  AND produits.id_region = regions.id 
		  AND produits.id_categorie = categories.id
		  ORDER BY id DESC LIMIT ".$start.",".$nbrarticle."
		  ";
		$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
			$stmt->execute();
			$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $products;
			}
public function selectProductWhereRegions($start,$nbrarticle,$id_region){
	$sql="SELECT produits.id,produits.nom,produits.description,produits.prix,produits.image_url,produits.stock,categories.nom_categorie,regions.nom_region 
	FROM produits,categories,regions 
	WHERE produits.id_region = :id_region 
	AND produits.id_region = regions.id 
	AND produits.id_categorie = categories.id
	ORDER BY id DESC LIMIT ".$start.",".$nbrarticle."
	";
		$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':id_region', $id_region, PDO::PARAM_INT);
			$stmt->execute();
			$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $products;
			}
//COUNT TOTAL ARTICLE
public function totalProducts(){
    $sql = "SELECT id FROM produits";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
     $nbrarticle = $stmt->rowCount();
    return $nbrarticle;
}
public function totalProductsSameCategories($id_categorie){
	$sql = "SELECT id FROM produits WHERE id_categorie=:id_categorie";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
		'id_categorie'=> $id_categorie
	]);
     $nbrarticle = $stmt->rowCount();
    return $nbrarticle;
}
public function totalProductsSameRegions($id_regions){
	$sql ="SELECT id FROM produits WHERE id_region=:id_region";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute([
		'id_region' => $id_regions
	]);
	$nbrarticle = $stmt->rowCount();
    return $nbrarticle;
}
//SELECT ALL FOR COOKIE
	public function selectPanierCookie($id){
			$sql = "SELECT produits.nom,produits.description,produits.prix,
						   produits.image_url,produits.stock,categories.nom_categorie,
						   regions.nom_region 
					FROM produits,categories,regions 
					WHERE produits.id=:id
					AND produits.id_categorie = categories.id 
					AND produits.id_region = regions.id
					";
			$stmt = $this->pdo->prepare($sql);
			//le BINDPARAM: peut etre moddifié
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			$item = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!$item)
			{
				return false;
			}
			else
			{
				return $item;
			}
		}
/////SELECT PRODUCT VIA ID FOR UPDATE
public function selectProduct($id){
	$sql = "SELECT id, nom, description, prix, image_url, stock, id_categorie,id_region FROM produits WHERE id = :id";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute([
		'id' => $id
	]);
	$userid = $stmt->fetch(PDO::FETCH_ASSOC);
	if(!$userid)
	{
		return false;
	}
	else
	{
		return $userid;
	}
}

}