<?php include('config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="styles/index.css" />
    <title>Document</title>
</head>

<body>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/vuetify@3.2.5/dist/vuetify.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/vuetify@3.2.5/dist/vuetify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <div id="app">
        <div class="main_loading" v-if='loading_page'>
            <v-progress-circular indeterminate color="#3498db" class='loding_animation'
                :size="50"></v-progress-circular>
        </div>
        <?php
        if (strpos($_SERVER['REQUEST_URI'], '/ajax') == false) {
            if (@$_SESSION['user_login'] == true) {
                include('Pages/main.php');
            } else {
                include('login.php');
            }
        }
        ?>
    </div>
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
                    form_con_password: '',
                    tab: null,
                    url: 'http://localhost/manager_app'
                };
            },
            methods: {
                loginAccount() {
                    const formData = new FormData();
                    formData.append('cnpj', this.form_cnpj);
                    formData.append('password', this.password);
                    axios.post(`${this.url}/ajax/user_handle.php`, formData)
                        .then((response) => {
                            if (response.data.success == true) {
                                window.location.href = this.url
                            }
                        })
                },
                createAccount() {
                    const formData = new FormData();
                    formData.append('cnpj', this.form_cnpj);
                    formData.append('password', this.password);
                    axios.post(`${this.url}/ajax/user_handle.php`, formData)
                        .then((response) => {
                            if (response.data.success == true) {
                                window.location.href = this.url
                            }
                        })
                }
            }
        })
            .use(vuetify)
            .mount("#app");
    </script>
</body>

</html>