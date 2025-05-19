<?php
require_once(__DIR__ . '/../config/config.php');

class BancoDeDados {
    private $servidor;
    private $usuario;
    private $senha;
    private $baseDeDados;
    private $conexao;

    public function __construct() {
        $this->servidor = DB_HOST;
        $this->usuario = DB_USER;
        $this->senha = DB_PASS;
        $this->baseDeDados = DB_NAME;
    }

    public function conectar() {
        $this->conexao = new mysqli($this->servidor, $this->usuario, $this->senha, $this->baseDeDados);
        
        if ($this->conexao->connect_error) {
            die("Falha na conexão: " . $this->conexao->connect_error);
        }
        
        // Criar tabela se não existir
        $sql = "CREATE TABLE IF NOT EXISTS carros (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome_modelo VARCHAR(100) NOT NULL,
            fabricante_montadora VARCHAR(100) NOT NULL,
            ano_fabricacao INT NOT NULL,
            preco DECIMAL(10,2) NOT NULL
        )";
        
        $this->conexao->query($sql);
    }

    public function inserirCarro($carro) {
        $stmt = $this->conexao->prepare("INSERT INTO carros (nome_modelo, fabricante_montadora, ano_fabricacao, preco) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssid", $carro->getNomeModelo(), $carro->getFabricanteMontadora(), $carro->getAnoFabricacao(), $carro->getPreco());
        return $stmt->execute();
    }

    public function retornarCarros() {
        $result = $this->conexao->query("SELECT * FROM carros ORDER BY nome_modelo");
        $carros = [];
        
        while ($row = $result->fetch_assoc()) {
            $carro = new Carro($row['nome_modelo'], $row['fabricante_montadora'], $row['ano_fabricacao'], $row['preco']);
            $carro->setId($row['id']);
            $carros[] = $carro;
        }
        
        return $carros;
    }
}
?>