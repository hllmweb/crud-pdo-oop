<?php

class edita extends conexaoPDO{
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

    public function editarDados(){
        $this->query = "UPDATE $this->tabela SET $this->campo WHERE id = {$this->valor}";
        $result = parent::executarQuery($this->query);
        if($result):
            return 1;
        else:
            return 0;
        endif;

    }

}

?>