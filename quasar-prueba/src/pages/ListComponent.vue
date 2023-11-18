<template>
    <q-page padding>
      <h4>Listado de productos</h4>
      <div class="q-pa-md">
        <q-table 
        title="Productos"
        :columns="columns"
        :rows="product"
        no-data-label="Sin productos para mostrar">
           
          <template v-slot:body-cell-actions="props">
            <q-td :props="props" class="q-gutter-sm">
              <q-btn icon="edit" color="info" dense size="sm"/>
              <q-btn icon="delete" color="negative" dense size="sm"/>
            </q-td>
          </template>
        </q-table>
         
                    
                 
      </div>
    </q-page>
    
</template>
  
<script>
  import axios from 'axios';
  export default {
    data() {
      return {
        product: [],
      };
    },
    mounted() {
      this.getProduct();
    },
    methods:{
      getProduct(){
        axios.get('http://localhost:8000/api/products').then(
          response => (
            this.product = response.data
          )
        );
      }
    },
  };
</script>