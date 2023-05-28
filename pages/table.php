<div class="table-container">
    <v-btn class="btn_create" @click='dialog = true'>
        <span class="material-symbols-outlined">add</span>
        Criar Produto
    </v-btn>
    <div class="table">
        <div class="row header">
            <div class="cell">ID</div>
            <div class="cell">Produto</div>
            <div class="cell">Quantidade</div>
            <div class="cell">Fornecedor</div>
            <div class="cell">Ações</div>
        </div>
        <div class="row" v-for='item in products' :key='products.id'>
            <div class="cell">{{item.id}}</div>
            <div class="cell">{{item.name}}</div>
            <div class="cell">{{item.amount}}</div>
            <div class="cell">{{item.supplier}}</div>
            <div class="cell">
                <v-btn color="primary" @click='editProductInfos(item)'>
                    Editar
                </v-btn>
                <v-btn color="red" @click='deleteProduct(item.id)'>
                    Deletar
                </v-btn>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
    <v-dialog v-model="dialog" width="700">
        <v-card style="padding:10px">
            <v-text-field label="Produto" variant="solo" v-model='p_name'></v-text-field>
            <v-text-field label="Quantidade" variant="solo" v-model='p_amount'></v-text-field>
            <v-text-field label="Fornecedor" variant="solo" v-model='p_supplier'></v-text-field>
            <v-textarea label="Descrição" auto-grow variant="outlined" rows="3" row-height="25" shaped
                v-model='p_description'></v-textarea>
            <v-card-actions>
                <v-btn color="green" block @click="createProduct">Salvar</v-btn>
            </v-card-actions>
            <v-card-actions>
                <v-btn color="primary" block @click="dialog = false">Cancelar</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</div>