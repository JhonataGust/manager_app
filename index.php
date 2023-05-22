<?php include('config.php') ?>
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
        <div class="alert_animation" v-if='is_alert'>
            {{alert_message}}
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

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/vuetify@3.2.5/dist/vuetify.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/vuetify@3.2.5/dist/vuetify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!--Sources to use js libraries-->
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
                    form_con_password: '',
                    tab: null,
                    url: 'http://localhost/manager_app',
                    is_alert: false,
                    alert_message: null
                };
            },
            methods: {
                showAlert(alert_text, time) {
                    this.is_alert = true
                    setTimeout(() => {
                        this.alert_message = alert_text
                    }, time)
                },
                loginAccount() {
                    const formData = new FormData();
                    formData.append('cnpj', this.form_cnpj);
                    formData.append('password', this.form_password);
                    axios.post(`${this.url}/ajax/user_handle.php`, formData)
                        .then((response) => {
                            if (response.data.success == true) {
                                window.location.href = this.url
                            }else {
                                this.showAlert('error', 1000)
                            }
                        })
                },
                createAccount() {
                    const formData = new FormData();
                    formData.append('cnpj', this.form_cnpj);
                    formData.append('password', this.form_password);
                    axios.post(`${this.url}/ajax/user_handle.php`, formData)
                        .catch((response) => {
                            console.log(response)
                        })
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