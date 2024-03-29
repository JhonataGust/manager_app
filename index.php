<?php include('config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles/index.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Manager App</title>
</head>

<body>
    <?php echo @$_SESSION['user_login'] ? '' : '<div id="particles"></div>' ?>
    <div id="app">
        <div class="main_loading" v-if='loading_page'>
            <v-progress-circular indeterminate color="#3498db" class='loding_animation'
                :size="50"></v-progress-circular>
        </div>
        <div class="alert_animation" v-if='is_alert'>
            {{alert_message}}
        </div>
        <?php
        if (strpos($_SERVER['REQUEST_URI'], '/ajax') == false) {
            if (@$_SESSION['user_login'] == true) {
                include('pages/main.php');
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script>



    <!--Sources to use js libraries-->
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"
        crossorigin="anonymous"></script>
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
                    formatted_cnpj: '',
                    form_password: '',
                    form_con_password: '',
                    tab: null,
                    url: 'http://localhost/manager_app',
                    is_alert: false,
                    alert_message: null,
                    validatePassword: false,
                    overlay: false,
                    dialog: false,
                    products_show_infos: {},
                    p_name: '',
                    p_description: '',
                    p_amount: '',
                    p_stock: '',
                    p_supplier: '',
                    id: null,
                    products: []
                }
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
                    axios.post(`${this.url}/ajax/user_handle.php?create=false`, formData)
                        .then((response) => {
                            if (response.data.success == true) {
                                localStorage.setItem('user_cnpj', this.form_cnpj)
                                window.location.href = this.url
                            } else {
                                alert('Senha ou Cnpj Incorreto');
                            }
                        })
                },
                createAccount() {
                    const formData = new FormData();
                    formData.append('cnpj', this.form_cnpj);
                    formData.append('password', this.form_password);
                    axios.post(`${this.url}/ajax/user_handle.php?create=true`, formData)
                        .catch((response) => {
                            console.log(response)
                        })
                        .then((response) => {
                            if (response.data.success == true) {
                                alert('Conta Criada');
                                window.location.href = this.url
                            }
                        })
                },
                togglePasswordVisibility() {
                    let passwordInput = document.querySelector('input[name="password"]');
                    passwordInput.type = (passwordInput.type === 'password') ? 'text' : 'password';
                },
                showProductInfos(data) {
                    this.dialog = true;
                    this.products_show_infos = data
                },
                createProduct() {
                    const formData = new FormData();
                    formData.append('name', this.p_name);
                    formData.append('description', this.p_description);
                    formData.append('stock', this.p_stock);
                    formData.append('amount', this.p_amount);
                    formData.append('supplier', this.p_supplier);
                    formData.append('id', this.id)

                    axios.post(`${this.url}/ajax/product_handle.php`, formData)
                        .then((response) => {
                            this.id = null
                            if (response.data.success == true) {
                                this.getProducts()
                                this.dialog = false
                            } else {
                                this.showAlert('error', 1000)
                            }
                        })
                },
                getProducts() {
                    axios.get(`${this.url}/ajax/product_handle.php`)
                        .then((response) => {
                            this.products = response.data
                        })
                },
                deleteProduct(id) {
                    axios.delete(`${this.url}/ajax/product_handle.php?id=${id}`)
                        .then(() => {
                            this.getProducts()
                        })
                },
                editProductInfos(params) {
                    this.p_name = params.name
                    this.p_description = params.description
                    this.p_amount = params.amount
                    this.p_supplier = params.supplier
                    this.id = params.id
                    this.dialog = true
                },
                destroySession() {
                    axios.delete(`${this.url}/ajax/session_handle.php`)
                        .then((response) => {
                            window.location.href = this.url
                        })
                },
                formatDate(date) {
                    const dateTime = new Date(date);
                    const day = dateTime.getDate().toString().padStart(2, '0');
                    const month = (dateTime.getMonth() + 1).toString().padStart(2, '0');
                    const year = dateTime.getFullYear().toString();
                    const hour = dateTime.getHours().toString().padStart(2, '0');
                    const minute = dateTime.getMinutes().toString().padStart(2, '0');
                    const second = dateTime.getSeconds().toString().padStart(2, '0');

                    return `${day}/${month}/${year} ${hour}:${minute}:${second}`;
                },
                generatePDF() {
                    const doc = new jsPDF();

                    doc.fromHTML(`
                    <p>CPNJ: ${localStorage.getItem('user_cnpj')}</p>
                    <p>Quantidade: ${this.products.length}</p>
                    <table border="1" cellpadding="8" style="font-size: 10px;">
                        <tr>
                            <th style="font-size: 10px; height: 20px;">ID</th>
                            <th style="font-size: 10px; height: 20px;">Produto</th>
                            <th style="font-size: 10px; height: 20px;">Quantidade</th>
                            <th style="font-size: 10px; height: 20px;">Fornecedor</th>
                        </tr>
                        ${this.products.map((item, i) => {
                            return `<tr>
                                <td>${i + 1}</td>
                                <td>${item.name}</td>
                                <td>${item.amount}</td>
                                <td>${item.supplier}</td>
                            </tr>`;
                        }).join('')}
                    </table>`, 10, 10);

                    doc.save('relatorio.pdf');
                }
            },
            watch: {
                form_cnpj(value) {
                    const cnpj = value.replace(/\D/g, ''); // Remove caracteres não numéricos
                    const cnpjMask = '##.##.##/###-##';
                    let formattedCnpj = '';

                    for (let i = 0; i < cnpj.length && i < cnpjMask.length; i++) {
                        if (cnpjMask[i] === '#') {
                            formattedCnpj += cnpj[i];
                        } else {
                            formattedCnpj += cnpjMask[i];
                            formattedCnpj += cnpj[i] || '';
                        }
                    }

                    this.form_cnpj = formattedCnpj;
                },
                form_password(value) {
                    let passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/;
                    this.validatePassword = passwordRegex.test(value);
                }
            },
            mounted() {
                this.getProducts()
            }
        })
            .use(vuetify)
            .mount("#app");
    </script>

    <style>
        .error {
            border: 1.1px solid rgb(177, 47, 47);
        }

        .pwdGroup {
            width: 100%;
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            gap: 5px;
            position: relative;
        }

        .span_error {
            width: 100%;
            padding: 0px 35px;
            font: .5em normal 'Arial';
            color: rgb(177, 47, 47);
            margin-top: -25px;
        }

        .pwdGroup .password-toggle {
            position: absolute;
            left: 87%;
            top: 34%;
            cursor: pointer;
        }

        .password-toggle path {
            color: #03C6B8;
        }
    </style>
</body>

</html>