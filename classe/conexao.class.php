<?php
/*
    Fazendo conexão com o banco de dados.
    Utilizando PDO para conexão
*/

class conexaoPDO{
    public $dns;
    public $usuarioBD;
    public $senhaBD;
    public $pdo;
    public $query;
    public $msg;

    public function __construct($dsn='mysql:dbname=crud; host=localhost',$usuarioBD='root',$senhaBD=''){
        $this->dsn          = $dsn;
        $this->usuarioBD    = $usuarioBD;
        $this->senhaBD      = $senhaBD;
        
        
        $this->conectar();
    }

    public function conectar(){
        try{
            $this->pdo = new PDO($this->dsn, $this->usuarioBD, $this->senhaBD);
            $this->pdo->exec("SET CHARACTER SET utf8");
            if($this->pdo):
                $this->msg = "Conexão efetuada com sucesso";
            endif;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function executarQuery($query){
        $this->query = $this->pdo->prepare($query);
        $this->query->execute();
        return $this->query;
    }


    public function getMsg(){
        return $this->msg;
    }
}
?>