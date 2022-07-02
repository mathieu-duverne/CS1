<?php 
require_once'Controleur.php';
class ControleurProduct extends Controleur
{
    
    public function route_produits(){

        $success = [
            'insertPanier' => '',
            'updateQuantite' => '',
            'deleteProduit' => ''
        ];

        //SI AJOUE AU PANIER SOIT PAS DE PANIER INSERT//SOIT PANNIER MAIS PAS LE PRODUIT AJOUTER DEDANS INSERT
        //SOIT UPDATE quantite du produit deja selectionner +1
    if(isset($_POST['product'])){
        $id_produit = intval($_POST['product']);
            if(isset($_SESSION['user']['id']))
            {
                $id_utilisateur = $_SESSION['user']['id'];
                $statut = 0;
                $selectProduitPanier = $this->panier->id_utilisateurExist($id_utilisateur, $statut);
                //SI USER EXIST
            if($selectProduitPanier===false)
                {
                    //SI USER N'AS PAS DE PANIER
                    $quantite = 1;
                    $statut = 0;
                    $n_commandNotcheck = $_SESSION['n_commande'];
                    $n_commande = parent::recuriveWHOU($n_commandNotcheck);
                    $_SESSION['n_commande_check'] = $n_commande;
                    $this->panier->insertPanier($id_produit,$id_utilisateur,$quantite,$statut,$n_commande);
                    $success['insertPanier'] = '<span>Votre Produit a était inserez a votre panier</span>';
                    header("refresh: 2;");
                }
            //sinon il a un panier est ce qu'il ya deja selectionné ce produit si non INSERT
            else
            {
            $id_produitExist = parent::produitExistInPanier($selectProduitPanier,$id_produit);
            if($id_produitExist===false){
                    $quantite = 1;
                    $statut = 0;
                    $this->panier->insertPanier($id_produit,$id_utilisateur,$quantite,$statut , $_SESSION['n_commande_check']);
                    $success['insertPanier'] = '<span>Votre Produit a était inserez a a votre panier</span>';
                    header("refresh: 2;");
            } 
            //SI OUI UPDATE RAJOUTE 1 QUANTITER
            else {
                    $id_produitExist++;
                    $this->panier->updateQuantite($id_produitExist,$id_produit,$id_utilisateur);
                    $success['updateQuantite'] = '<span>rajoutez autant de fois cet article dans votre panier</span>';
                    header("refresh: 2;");
                }
            }
        }
        //sinon en COOKIE le panier
        else
        {
            $id_utilisateur = $_COOKIE['PHPSESSID'];
            //NE POSSEDE PAS DE PANER
            
            if(!isset($_COOKIE['items'])){
                setcookie("cookieItem", 0, time()+7200);
                $quantite = 1;
                $statut = 0;
                setcookie("items[1]", $id_produit."__".$id_utilisateur."__".$quantite."__".$statut, time()+7200);
                $success['insertPanier'] = '<span>Votre Produit a était inserez a votre panier first</span>';
//                echo"<p style='color: white>+++</p>";
                setcookie("cookieItem", $_COOKIE['init'] + 1, time()+7200);
                header("refresh: 3;");
            }
            else
            //USER NOT CONNECTED IL A DEJA UN PANIER
            {
                $id_produitExist = parent::produitExistInCookie($id_produit,$_COOKIE['items']);
                //SI LE PRODUIT N'EXISTE PAS INSERT
                if($id_produitExist===false){
                    $quantite=1;
                    $statut=0;
                    $m = array_key_last($_COOKIE['items']);
                    $m++;
                    setcookie("items[$m]", $id_produit."__".$id_utilisateur."__".$quantite."__".$statut, time()+7200);
                    setcookie("cookieItem", $_COOKIE['cookieItem'] + 1, time()+7200);
//                  echo"<p style='color: white>+++</p>";
                    $success['insertPanier'] = '<span>Votre Produit a était inserez a votre panier second</span>';
                    header("refresh: 3;");
                 }
                //SINON UPDATE PRODUITS
                else{
                    $quantite=$id_produitExist[2]+1;
                    $statut = 0;  
                    setcookie("items[$id_produitExist[0]]", $id_produit."__".$id_utilisateur."__".$quantite."__".$statut, time()+7200);
                    $success['updateQuantite'] = '<span>Votre Produit a était rajoutez</span>';
                    header("refresh: 3;");
                    }  
                }
            }          
        }

         //MSG SUCEESS DELETE
        if(isset($_GET['success'])){
        $success['deleteProduit'] = '<span>Votre Produit a était supprimer du panier</span>';
        header("Refresh:2; url=index.php?page=cart");
        }
        if(isset($_GET['successUpdate'])){
            $success['updateQuantite'] = '<span>Votre Produit a était rajoutez</span>';
            header("Refresh:2; url=index.php?page=cart");
        }
//  COUNT ITEM COOKIE

            //si USER UPDATE PANIER
        if(isset($_GET['updatePanier'])){
            $infoProduits = explode("__", $_GET['updatePanier']);
            $infoProduits[1]++;
            $this->panier->updateQuantite($infoProduits[1],$infoProduits[0],$_SESSION['user']['id']);
            $success['updateQuantite'] = '<span>rajoutez autant de fois cet article dans votre panier</span>';
            header("Refresh:2; url=index.php?page=cart");
        }
        if(isset($_GET['deletePanier']))
        {
            $id_produit = intval($_GET['deletePanier']);
            $this->panier->deletePanier($_SESSION['user']['id'],$id_produit);
            $success['deleteProduit'] = '<span>Votre Produit a était supprimer du panier</span>';
            header("Refresh:2; url=index.php?page=cart");
        }
//PAGINATION
$viewPagination = "";
//cette variable indique combien de produits tu veux par page
$viewarticle = 5;
     //SELECT ALL PRODUIT BDD SANS FILTRES
     if(!isset($_GET['categories']) && !isset($_GET['regions']))
     {
        if(isset($_GET['start']) && !empty($_GET['start']) && $_GET['start'] > 0)
        {
            $total = $this->product->totalProducts();
            $totalarticle = ceil($total/$viewarticle);
            $pagecourante = intval($_GET['start']);
            $start = ($pagecourante-1)*$viewarticle;
            $allProducts = $this->product->selectAllProducts($start,$viewarticle);
            for($a=1;$a<=$totalarticle;$a++)
            {
                    if($a==$pagecourante)
                    {
                        $viewPagination.="<a style='color:#DCDCDC' href=''>$a</a>";
                    }
                    else
                    {   
                        $viewPagination.="<a  href='index.php?page=produits&start=".$a."'>$a</a>";
                    } 
                        $viewPagination.="</ul></nav>";
            }
        }
        else
            {
            $pagecourante = 1;
            header('location:index.php?page=produits&start='.$pagecourante.'');
            }
     }
     //WITH FILTRES categorie
     if(isset($_GET['categories']) && !isset($_GET['regions']))
    {
        if(isset($_GET['start']))
        {
            $pagecourante = intval($_GET['start']);
        }
        else
        {
            $pagecourante = 1;
        }
        $categorie = intval($_GET['categories']);
        $total = $this->product->totalProductsSameCategories($categorie);
        
        $totalarticle = ceil($total/$viewarticle);
        $start = ($pagecourante-1)*$viewarticle;
        $allProducts = $this->product->selectProductWhereCategories($start,$viewarticle,$categorie);
            for($a=1;$a<=$totalarticle;$a++)
                {
                        if($a==$pagecourante)
                        {
                            $viewPagination.="<a style='color:#DCDCDC' href='' disabled>$a</a>";
                        }
                        else
                        {   
                            $viewPagination.="<a  href='index.php?page=produits&categories=".$categorie."&start=".$a."'>$a</a>";
                        } 
                            $viewPagination.="</ul></nav>";
                }
    }
     //WITH FILTRE REGION
    if(isset($_GET['regions']) && !isset($_GET['categories']))
    {
        if(isset($_GET['start']))
        {
        $pagecourante = intval($_GET['start']);
        
        }
        else{
        $pagecourante = 1;
        }
        $id_regions = intval($_GET['regions']);
        $total = $this->product->totalProductsSameRegions($id_regions);
        $totalarticle = ceil($total/$viewarticle);
        $start = ($pagecourante-1)*$viewarticle;
        $allProducts = $this->product->selectProductWhereRegions($start,$viewarticle,$id_regions);
        for($a=1;$a<=$totalarticle;$a++)
            {
                    if($a==$pagecourante)
                    {
                        $viewPagination.="<a style='color:#DCDCDC' href='' disabled>$a</a>";
                    }
                    else
                    {   
                        $viewPagination.="<a  href='index.php?page=produits&regions=".$id_regions."&start=".$a."'>$a</a>";
                    } 
                        $viewPagination.="</ul></nav>";
            }
    }
    //PAGINATION A PARTIR DE ////$pagecourante&totalarticle///
    
    //SELECT ALL CATEGORIE
    $allCategories = $this->admincategories->selectAllCategories();
    //SELECT ALL REGIONS 
    $allRegions = $this->adminregions->selectAllRegions();

//     var_dump($_)
            
         
        require'Vue/vueProduits.php';
    }
}