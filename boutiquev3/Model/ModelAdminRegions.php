<?php
require_once 'Model/ModelAdmin.php';

class adminregions extends admin
{
    protected $pdo;

//SELECT ALL REGIONS
public function selectAllRegions(){
    $sql = "SELECT * FROM regions";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    while($regions= $stmt->fetchAll(PDO::FETCH_ASSOC)){
        return $regions;
    }
}

//SELECT A REGION
public function selectRegion($id){
    $sql = "SELECT id, nom_region FROM regions WHERE id=:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
		'id' => $id
	]);
	$region= $stmt->fetch(PDO::FETCH_ASSOC);
	if(!$region)
	{
		return false;
	}
	else
	{
		return $region;
	}
}

//INSERT REGIONS
public function insertRegion($nom_region){
    $query = $this->pdo->prepare('INSERT INTO regions SET nom_region=:nom_region');
	$query->execute(compact('nom_region'));
}
//UPDATE REGIONS
public function updateRegion($id, $nom){
    $sql = "UPDATE regions SET nom_region=:nom_region WHERE id=:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'nom_region' => $nom
    ]);
}
//DELETE REGION
public function deleteRegion($id){
    $sql = "DELETE FROM regions WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);
}


}