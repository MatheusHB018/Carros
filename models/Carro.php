<?php
class Carro {
    private $id;
    private $nomeModelo;
    private $fabricanteMontadora;
    private $anoFabricacao;
    private $preco;

    public function __construct($nomeModelo, $fabricanteMontadora, $anoFabricacao, $preco) {
        $this->nomeModelo = $nomeModelo;
        $this->fabricanteMontadora = $fabricanteMontadora;
        $this->anoFabricacao = $anoFabricacao;
        $this->preco = $preco;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getNomeModelo() { return $this->nomeModelo; }
    public function getFabricanteMontadora() { return $this->fabricanteMontadora; }
    public function getAnoFabricacao() { return $this->anoFabricacao; }
    public function getPreco() { return $this->preco; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setNomeModelo($nomeModelo) { $this->nomeModelo = $nomeModelo; }
    public function setFabricanteMontadora($fabricanteMontadora) { $this->fabricanteMontadora = $fabricanteMontadora; }
    public function setAnoFabricacao($anoFabricacao) { $this->anoFabricacao = $anoFabricacao; }
    public function setPreco($preco) { $this->preco = $preco; }

    public function atualizarPreco($taxa) {
        $this->preco = $this->preco * (1 + ($taxa / 100));
    }
}
?>