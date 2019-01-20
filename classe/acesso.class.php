<?php

class acesso extends conexaoPDO{
    public $tabela;
    public $query;

    public function setTabela($tabela){
        $this->tabela = $tabela;
    }

    public function setAcesso($email, $senha){
        $this->query = "SELECT * FROM $this->tabela WHERE email='$email' AND senha='$senha'";
        $result = parent::executarQuery($this->query);
        if($result->rowCount() == 1):

            session_start();

            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            
            if(isset($_SESSION["email"]) && isset($_SESSION["senha"])):
                return 1;
            else:
                return 0;
            endif;
           
        endif;
    }
    

    public function acessoProtegido(){
		if(!isset($_SESSION["email"]) && !isset($_SESSION["senha"])):
			session_destroy();

			unset($_SESSION["email"],$_SESSION["senha"]);
			header("Location: login.php");
		endif;
	}



}

?>













