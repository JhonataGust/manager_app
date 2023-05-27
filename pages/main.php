<section class="main_page">
    <div class="log_out" @click='destroySession'>Log Out</div>
    <v-card>
        <v-tabs v-model="tab" bg-color="primary">
            <v-tab value="one">Produtos</v-tab>
            <v-tab value="two"> Historico de Mudanças</v-tab>
            <v-tab value="three">Item Three</v-tab>
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
                    Three
                </v-window-item>
            </v-window>
        </v-card-text>
    </v-card>
</section>