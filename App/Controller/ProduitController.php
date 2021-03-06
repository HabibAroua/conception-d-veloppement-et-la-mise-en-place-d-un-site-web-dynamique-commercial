<?php
    require_once('../App/Model/Produit.php');
    
    class ProduitController
    {
        public function ajouterProduit($ref,$image,$libelle,$prix,$description,$id_cat,$login_admin,$quantite)
        {
            $p=new Produit($ref,$image,$libelle,$prix,$description,$id_cat,$login_admin,$quantite);
            $test=$p->add();
            if($test)
            {
                require_once 'alert.php';
                show("Ajout du produit effectué avec succes");
            }
            else
            {
                require_once 'alert.php';
                show("Erreur au niveau de l ajout");
            }
        }
        
        public function getAllProduitDisponible()
        {
            $p=new Produit('','','','','','','','');
            $T=$p->allProduitDisponible();
            return $T;
        }
        
        public function getAllProduit()
        {
            $p=new Produit('','','','','','','','');
            $T=$p->allProduit();
            return $T;
        }
        
        public function findProduit($n)
        {
            $p=new Produit('','','','','','','','');
            $T=$p->findProduitByName($n);
            return $T;
        }
        
        public function findProduitByRef($ref)
        {
            $p=new Produit('','','','','','','','');
            $T=$p->allProduit();
            foreach ($T as $v)
            {
                if($v{'ref'}==$ref)
                {
                    $p->setRef($v{'ref'});
                    $p->setImage($v{'image'});
                    $p->setLibelle($v{'libelle'});
                    $p->setPrix($v{'prix'}); 
                    $p->setDescription($v{'description'});
                    $p->setQuantite($v{'quantite'});
                    break;
                }
            }
            return $p;
        }
        
        public function modifierProduit($Oldref,$newRef,$libelle,$prix,$description,$quantite)
        {
            $p=new Produit('','','','','','','','');
            $p->setRef($newRef);
            $p->setLibelle($libelle);
            $p->setPrix($prix);
            $p->setDescription($description);
            $p->setQuantite($quantite);
            $test=$p->update($newRef);
            if($test)
            {
                require_once 'alert.php';
                show("Modification effectué avec succes");   
            }
            else
            {
                require_once 'alert.php';
                error("Erreur au niveau de modification");
            }
        }
        
        public function modifierCategorie($oldRef,$id_cat)
        {
            $p=new Produit('','','','','','','','');
            $p->setId_cat($id_cat);
            $test=$p->updateCategorie($oldRef);
            if($test)
            {
                require_once 'alert.php';
                show("Modification effectué avec succes"); 
            }
            else
            {
                require_once 'alert.php';
                error("Erreur au niveau de modification");
            }
        }
        
        public function modifierImage($oldRef,$image)
        {
            $p=new Produit('','','','','','','','');
            $p->setImage($image);
            $test=$p->updateImage($oldRef);
            if($test)
            {
                require_once 'alert.php';
                show("Modification effectué avec succes"); 
            }
            else
            {
                require_once 'alert.php';
                error("Erreur au niveau de modification");
            }
        }
        
        public function supprimerProduit($ref)
        {
            $p=new Produit('','','','','','','','');
            $test=$p->delete($ref);
            if($test)
            {
                require_once 'alert.php';
                show("Suppression effectué avec succes");
                echo "<script>document.location.href='http://localhost/SiteWebCommercial/Admin/Accueil.php?page=gereProduit';</script>";
            }
            else
            {
                require_once 'alert.php';
                error("Erreur au niveau du suppression");
            }
        }
    }
?>