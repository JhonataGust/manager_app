<div class="login_screen" id="login_screen">
    <div class="inputs_login" v-if="login_active">
        <v-text-field label="Digite seu CNPJ" variant="solo" v-model="form_cnpj"></v-text-field>
        <v-text-field label="Senha" variant="solo" v-model="form_password"></v-text-field>
        <v-btn block color="#3498db" size="x-large" style="color:#fff" @click="loginAccount">
            Entrar
        </v-btn>
    </div>
    <div v-else>
        <v-text-field label="Digite seu CNPJ" variant="solo" v-model="form_cnpj"></v-text-field>
        <v-text-field label="Senha" variant="solo" v-model="form_password"></v-text-field>
        <v-text-field label="Confirmar Senha" variant="solo" v-model="form_con_password"></v-text-field>
        <v-btn block color="#3498db" size="x-large" style="color:#fff" @click="createAccount">
            Entrar
        </v-btn>
    </div>
    <div style="
        color:#ccc;
        margin-top:10px;
        cursor:pointer;
    ">
        <a @click="login_active = !login_active">{{ login_active ? 'Ainda não possui conta?' : 'Ja possui conta?' }}</a>
    </div>
</div>