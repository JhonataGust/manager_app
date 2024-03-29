<div class="table-container">
    <div class="table_actions">
        <v-btn class="btn_create" @click='dialog = true'>
            <span class="material-symbols-outlined">add</span>
            Criar Produto
        </v-btn>
        <v-btn class="btn_create" @click='generatePDF()'>
            <span class="material-symbols-outlined">picture_as_pdf</span>
        </v-btn>
    </div>
    <div class="table">
        <div class="row header">
            <div class="cell">ID</div>
            <div class="cell">Produto</div>
            <div class="cell">Quantidade</div>
            <div class="cell">Fornecedor</div>
            <div class="cell">Ações</div>
        </div>
        <div class="row" v-for='(item, index) in products' :key='products.id'>
            <div class="cell">{{index + 1}}</div>
            <div class="cell">{{item.name}}</div>
            <div class="cell">{{item.amount}}</div>
            <div class="cell">{{item.supplier}}</div>
            <div class="cell">
                <v-btn class="btn_actions" @click='editProductInfos(item)'>
                    <span class="material-symbols-outlined">edit</span>
                </v-btn>
                <v-btn class="btn_actions" @click='deleteProduct(item.id)'>
                    <span class="material-symbols-outlined">delete</span>
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
            <v-textarea label="Descrição" auto-grow rows="3" row-height="25" variant="solo"
                v-model='p_description'></v-textarea>
            <div class="btn_group">
                <v-card-actions>
                    <v-btn  block @click="createProduct">
                        <span class="material-symbols-outlined">save</span>
                        <p>Salvar</p>
                    </v-btn>
                </v-card-actions>
                <v-card-actions>
                    <v-btn block @click="dialog = false">
                        <span class="material-symbols-outlined">close</span>
                        <p>Cancelar</p>
                    </v-btn>
                </v-card-actions>
            </div>
        </v-card>
    </v-dialog>
</div>