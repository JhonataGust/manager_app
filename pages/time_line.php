<v-timeline side="end">
  <v-timeline-item size="small" v-for='item in products' :key='products.id'>
    <v-alert :value="true">
      Id: {{item.id}} <br/>
      Produto: {{item.name}} <br/>
      Ultima Alteração: {{ formatDate(item.updated_at) }} <br/>
    </v-alert>
  </v-timeline-item>
</v-timeline>