<div>
    <p>CPNJ:
        <?php $_SESSION['cnpj'] ?>
    </p>
    <p>Quantidade: {{ products.length }}</p>
    <table border="1" cellpadding="8" style="font-size: 10px;">
        <tr>
            <th style="font-size: 10px; height: 20px;">ID</th>
            <th style="font-size: 10px; height: 20px;">Produto</th>
            <th style="font-size: 10px; height: 20px;">Quantidade</th>
            <th style="font-size: 10px; height: 20px;">Fornecedor</th>
        </tr>
        <tr v-for="item in products" :key="item.id">
            <td>{{ item.id }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.amount }}</td>
            <td>{{ item.supplier }}</td>
        </tr>
    </table>
</div>
<v-btn class="btn_create" @click='generatePDF()'>
    <span class="material-symbols-outlined">picture_as_pdf</span>
</v-btn>