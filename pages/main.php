<section class="main_page">
    <a class="aboutUs" href="aboutus.html" target="_blank" rel="external">About Us</a>
    <div class="log_out" @click='destroySession'>
        <span class="material-symbols-outlined">logout</span>
        <p class="log_out-phrase">Log Out</p>
    </div>
    <v-card class="primary_card">
        <v-tabs v-model="tab" bg-color="primary">
            <v-tab value="one">Produtos</v-tab>
            <v-tab value="two"> Histórico de Mudanças</v-tab>
            <v-tab value="three">PDF Preview</v-tab>
        </v-tabs>
        <v-card-text>
            <v-window v-model="tab">
                <v-window-item value="one">
                    <?php include('pages/table.php') ?>
                </v-window-item>

                <v-window-item value="two">
                    <?php include('pages/time_line.php') ?>
                </v-window-item>

                <v-window-item value="three">
                    <?php include('pages/pdf_view.php') ?>
                </v-window-item>
            </v-window>
        </v-card-text>
    </v-card>
</section>