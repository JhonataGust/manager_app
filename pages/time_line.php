<v-timeline side="end">
  <v-timeline-item dot-color='#03C6B8' size="small" v-for='(item, index) in products' :key='products.id' >
    <v-alert :value="true" color='#000035' style="color: #03C6B8">
      Id: {{index + 1}} <br/>
      Produto: {{item.name}} <br/>
      Ultima Alteração: {{ formatDate(item.updated_at) }} <br/>
    </v-alert>
  </v-timeline-item>
</v-timeline>