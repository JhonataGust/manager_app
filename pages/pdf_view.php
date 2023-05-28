<div>
    <p class="user_info">CPNJ: <?php echo $_SESSION['cnpj']; ?></p>
    <p class="user_info">Quantidade: {{ products.length }}</p>

    <table>
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Fornecedor</th>
        </tr>
        <tr v-for="(item, index) in products" :key="item.id">
            <td>{{ index + 1 }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.amount }}</td>
            <td>{{ item.supplier }}</td>
        </tr>
    </table>
</div>
<v-btn @click='generatePDF()'>
    <span class="material-symbols-outlined">picture_as_pdf</span>
</v-btn>