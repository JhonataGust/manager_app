<div id="particles"></div>
<div class="login_screen" id="login_screen">
    <div class="inputs_login" v-if="login_active">
        <img src="./assets/img/logo.png" alt="Manager App logo" class="logo_app">
        <h2 class="login_description">Entre na sua conta</h2>

        <input type="text" 
                name="cnpj"
                v-model="form_cnpj" 
                class="input" 
                placeholder="Digite seu CNPJ">
        
        <input type="password" 
                name="password" 
                v-model="form_con_password" 
                class="input" 
                placeholder="Digite sua Senha">
                
        <v-btn @click="loginAccount" class="entry_btn">
            Entrar
        </v-btn>
    </div>
    <div class="inputs_login" v-else>
        <img src="./assets/img/logo.png" alt="Manager App logo" class="logo_app">
        <h2 class="login_description">Crie sua conta</h2>

        <input type="text" 
                name="cnpj" 
                v-model="form_cnpj" 
                class="input" 
                placeholder="Digite seu CNPJ">
        
        <input type="password" 
                name="password" 
                v-model="form_password" 
                class="input" 
                placeholder="Digite sua Senha">

        <input type="password" 
                name="password" 
                v-model="form_con_password" 
                class="input" 
                placeholder="Confirmar Senha">

        <v-btn @click="createAccount" class="entry_btn">
            Entrar
        </v-btn>
    </div>
    <a @click="login_active = !login_active">{{ login_active ? 'Ainda não possui conta?' : 'Ja possui conta?' }}</a>
</div>