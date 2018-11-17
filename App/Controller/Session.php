<?php
    
    class Session
    {
        public function connect($login,$password)
        {
			// dans ce cas, tout est ok, on peut démarrer notre session
            // on la démarre :)
		    session_start ();
		    // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		    setcookie('login', $login, time() + 60);
		    setcookie('password', $password, time() + 60);
		    $_SESSION['login'] = $login;
		    $_SESSION['pwd'] = $password;
            // on redirige notre visiteur vers une page de notre section membre
		    header ('location: Accueil.php');
        }
        
        public function afterConnection()
        {
            session_start ();
            // On récupère nos variables de session
            if (isset($_SESSION['login']) && isset($_SESSION['password']) && isset($_COOKIE['login']) )
            {
                // On teste pour voir si nos variables ont bien été enregistrées
	            // On affiche un lien pour fermer notre session
	            echo '<a href="./logout.php">Déconnection</a>';
            }
            else
            {
                header ('location: login.php');
            }
        }
        
        public function logOut()
        {
            session_start ();
            // On détruit les variables de notre session
            session_unset ();
            // On détruit notre session
            session_destroy ();
            // On redirige le visiteur vers la page d'accueil
            header ('location: login.php');
        }
    }

?>