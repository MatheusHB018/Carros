<section class="form-section">
    <h2>Cadastrar Novo Carro</h2>
    <form action="index.php?action=cadastrar" method="post">
        <div class="form-group">
            <label for="nome_modelo">Modelo:</label>
            <input type="text" id="nome_modelo" name="nome_modelo" required>
        </div>
        
        <div class="form-group">
            <label for="fabricante_montadora">Fabricante/Montadora:</label>
            <input type="text" id="fabricante_montadora" name="fabricante_montadora" required>
        </div>
        
        <div class="form-group">
            <label for="ano_fabricacao">Ano de Fabricação:</label>
            <input type="number" id="ano_fabricacao" name="ano_fabricacao" min="1900" max="<?= date('Y') ?>" required>
        </div>
        
        <div class="form-group">
            <label for="preco">Preço (R$):</label>
            <input type="number" id="preco" name="preco" min="0" step="0.01" required>
        </div>
        
        <div class="form-group">
            <label for="taxa_atualizacao">Taxa de Atualização (%):</label>
            <input type="number" id="taxa_atualizacao" name="taxa_atualizacao" step="0.01">
        </div>
        
        <button type="submit">Cadastrar</button>
    </form>
</section>