<?php

class lista extends conexaoPDO{
    public $tabela;
    public $query;
    public $campo;
    public $valor;

    public function setTabela($tabela){
        $this->tabela = $tabela;
    }

    public function setCampo($campo){
        $this->campo = $campo;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function listaDados(){
        $this->query = "SELECT * FROM $this->tabela";
        $result = parent::executarQuery($this->query);
        return $result->fetchAll();
    }

    public function listaDado(){
        $this->query = "SELECT * FROM $this->tabela WHERE $this->campo = '$this->valor'";
        $result = parent::executarQuery($this->query);

        return $result->fetch(PDO::FETCH_ASSOC);
    }
}


?>
