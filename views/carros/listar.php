<section class="list-section">
    <h2>Carros Cadastrados</h2>
    
    <?php if (empty($carros)): ?>
        <p>Nenhum carro cadastrado.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Fabricante</th>
                    <th>Ano</th>
                    <th>Preço (R$)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carros as $carro): ?>
                    <tr>
                        <td><?= htmlspecialchars($carro->getNomeModelo()) ?></td>
                        <td><?= htmlspecialchars($carro->getFabricanteMontadora()) ?></td>
                        <td><?= $carro->getAnoFabricacao() ?></td>
                        <td><?= number_format($carro->getPreco(), 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>