<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="styles/index.css" />
    <title>Manager App</title>
</head>

<body>
    <div id="particles"></div>
    <div id="app">
        <div class="main_loading" v-if='loading_page'>
            <v-progress-circular indeterminate color="#3498db" class='loding_animation' :size="50"></v-progress-circular>
        </div>
        <?php
        if (@$_SESSION['user__auth'] == true) {
            include('Pages/main.php');
        } else {
            include('login.php');
        }
        ?>
    </div>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/vuetify@3.2.5/dist/vuetify.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/vuetify@3.2.5/dist/vuetify.min.js"></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
    <script src="./scripts/backgroundAnimation.js"></script>

    
    <script>
        const { createApp } = Vue;
        const { createVuetify } = Vuetify;

        const vuetify = createVuetify();

        const app = createApp({
            data() {
                return {
                    login_active: true,
                    loading_page: false,
                    form_cnpj: '',
                    form_password: '',
                    form_con_password: ''
                };
            },
            methods: {
                loginAccount() {
                    this.loading_page = true
                },
                createAccount() {
                    this.loading_page = false
                }
            }
        })
        .use(vuetify)
        .mount("#app");
    </script>
</body>
</html>