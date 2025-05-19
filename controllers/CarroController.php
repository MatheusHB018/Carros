<?php
require_once(__DIR__ . '/../models/BancoDeDados.php');
require_once(__DIR__ . '/../models/Carro.php');

class CarroController {
    private $bancoDeDados;

    public function __construct() {
        $this->bancoDeDados = new BancoDeDados();
        $this->bancoDeDados->conectar();
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $carro = new Carro(
                $_POST['nome_modelo'],
                $_POST['fabricante_montadora'],
                $_POST['ano_fabricacao'],
                $_POST['preco']
            );
            
            if (isset($_POST['taxa_atualizacao']) && is_numeric($_POST['taxa_atualizacao'])) {
                $carro->atualizarPreco($_POST['taxa_atualizacao']);
            }
            
            $this->bancoDeDados->inserirCarro($carro);
            header('Location: index.php?action=listar');
            exit;
        }
        
        require_once(__DIR__ . '/../views/templates/header.php');
        require_once(__DIR__ . '/../views/carros/cadastrar.php');
        require_once(__DIR__ . '/../views/templates/footer.php');
    }

    public function listar() {
        $carros = $this->bancoDeDados->retornarCarros();
        
        require_once(__DIR__ . '/../views/templates/header.php');
        require_once(__DIR__ . '/../views/carros/listar.php');
        require_once(__DIR__ . '/../views/templates/footer.php');
    }
}
?>