<?php
    require_once('../App/DataBase/query.php');
    
    class Reservation
    {
        private $login;
        private $ref_prod;
        private $date_res;
        private $nb;
        private $quantite;
        
        public function __construct()
        {
            $this->date_res=(new \DateTime())->format('Y-m-d');
        }
        
        public function getNb()
        {
            return $this->nb;
        }
        
        public function setNb($nb)
        {
            $this->nb=$nb;
        }
        
        public function getRef_prod()
        {
            return $this->ref_prod;
        }
        public function setRef_prod($ref_prod)
        {
            $this->ref_prod=$ref_prod;
        }
        
        public function getLogin()
        {
            return $this->login;
        }
        
        public function setLogin($login)
        {
            $this->login=$login;
        }
        
        public function getDate_res()
        {
            return $this->date_res;
        }
        
        public function setDate_res($date_res)
        {
            $this->date_res=$date_res;
        }
        
        public function add()
        {
            return input("insert into reservation values('$this->login')");
        }
        
        public function update()
        {
            
        }
        public function delete()
        {
            
        }
        public function allClient()
        {
            
        }
        
        public function nbPanier()
        {
            $res=output("select * from reservation ");
            $i=0;
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
                $i++;
            }
            return $i;
        }
    }