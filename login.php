<div id="particles"></div>
<div class="login_screen" id="login_screen">
    <div class="inputs_login" v-if="login_active">
        <img src="./assets/img/logo.png" alt="Manager App logo" class="logo_app">
        <h2 class="login_description">Entre na sua conta</h2>

        <input type="text" 
                name="cnpj"
                v-model="form_cnpj"
                maxlength="18"
                class="input" 
                :class="form_cnpj.length < 18 && form_cnpj.length > 0 ? 'error' : ''"
                placeholder="Digite seu CNPJ">
        
        <section class="pwdGroup">
            <input type="password"
                    name="password"
                    v-model="form_password"
                    class="input"
                    :class="!validatePassword && form_password.length > 0 ? 'error' : ''"
                    placeholder="Digite sua Senha">
            <span id="togglePassword" class="password-toggle" @click="togglePasswordVisibility">
                <i id="eyeIcon" class="far fa-eye"></i>
            </span>
        </section>
        <span v-if="!validatePassword && form_password.length > 0" class="span_error">Insira pelo menos 8 caracteres válidos</span>
                
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
                maxlength="18"
                class="input" 
                :class="form_cnpj.length < 18 && form_cnpj.length > 0 ? 'error' : ''"
                placeholder="Digite seu CNPJ">
        
        <section class="pwdGroup">
            <input type="password"
                    name="password"
                    v-model="form_password"
                    class="input"
                    :class="!validatePassword && form_password.length > 0 ? 'error' : ''"
                    placeholder="Digite sua Senha">
            <span id="togglePassword" class="password-toggle" @click="togglePasswordVisibility">
                <i id="eyeIcon" class="far fa-eye"></i>
            </span>
        </section>
        <span v-if="!validatePassword && form_password.length > 0" class="span_error">Insira pelo menos 8 caracteres válidos</span>

        <input type="password" 
                name="password" 
                v-model="form_con_password" 
                class="input" 
                placeholder="Confirmar Senha">

        <v-btn @click="createAccount" class="entry_btn">
            CRIAR CONTA
        </v-btn>
    </div>
    <a @click="login_active = !login_active">{{ login_active ? 'Ainda não possui conta?' : 'Ja possui conta?' }}</a>
</div>