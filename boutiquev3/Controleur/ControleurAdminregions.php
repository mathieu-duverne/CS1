<?php
require_once'Controleur.php';

class ControleurAdminRegions extends Controleur
{
    protected $adminregions;

    public function route_adminRegions(){

            $error = [
                'empty' => ''
            ];
            $success = [
                'insert' => '',
                'update' => '',
                'delete' => ''
            ];

        if(!isset($_POST['updateRegion'])){
        $regions = $this->adminregions->selectAllRegions();
        }
        //BTN UPDATE region
        if(isset($_POST['updateRegion'])){
            $id = intval($_POST['updateRegion']);
            $region = $this->adminregions->selectRegion($id);
        }
        //SI ADMIN UPDATE
        if(isset($_POST['submitUpdate'])){
            if(empty($_POST['nom'])){
                $error['empty'] = "<span>La regions doit contennir des caractéres</span>";
            }
            else{
                $id = intval($_POST['id']);
                $nom = htmlspecialchars($_POST['nom']);
                $this->adminregions->updateRegion($id,$nom);
                $success['update'] = "<span>Bravo Categorie UPDATE 3 2 1 0</span>";
                header("refresh: 2;");
            }
        }
        //si ADMIN DELETE REGION
        if(isset($_POST['deleteRegion'])){
            $id = intval($_POST['deleteRegion']);
                $this->adminregions->deleteRegion($id);
                $success['delete'] = "<span>Bravo Categorie DELETE</span>";
                header("refresh: 2;");
        }

        //INSERT REGION
        if(isset($_POST['insertRegion'])){
            if(empty($_POST['regions'])){
                $error['empty'] = "<span>La regions doit contennir des caractéres</span>";
            }
            else {
                $ins_region = htmlspecialchars($_POST['regions']);
                $this->adminregions->insertRegion($ins_region);
                $success['insert'] = "<span>Bravo Regions INSERT</span>";
                header("refresh: 2;");
            }
        }
        require'Vue/vueAdminRegions.php';
    }
}