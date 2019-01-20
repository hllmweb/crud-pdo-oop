<?php

class busca extends conexaoPDO{
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

    public function buscaDados(){
        $this->query = "SELECT * FROM $this->tabela WHERE $this->campo LIKE '%$this->valor%'";
        $result = parent::executarQuery($this->query);
        if($result->rowCount() > 0):
            return $result->fetchAll(PDO::FETCH_ASSOC);
        endif;
    }
}

?>