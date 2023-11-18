<template>
     <q-page padding>
        <h4>Detalle de Producto</h4>
        <div class="q-pa-md">
            <q-table title="Variantes" :rows="variations" :columns="columns" row-key="referencia">
            <template v-slot:body-cell-actions="props">
                <q-tr :props="props">
                <q-td key="referencia" :props="props"> {{ props.variations.referencia }} </q-td>
                <q-td key="descripcion" :props="props"> {{ props.variations.descripcion }} </q-td>
                <q-td key="precio" :props="props"> {{ props.variations.precio }} </q-td>
                <q-td key="product_id" :props="props"> {{ props.variations.product.nombre }} </q-td>
 
                <q-td :props="props">
                    <q-btn dense flat color="primary" field="edit" icon="edit" />
                    <q-btn dense flat color="negative" field="delete" icon="delete" />
                </q-td>
                </q-tr>
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
        variations: [],
      };
    },
    mounted() {
      this.getVariations();
    },
    methods:{
      getVariations(){
        axios.get('http://localhost:8000/api/variations').then(
          response => (
            this.variations = response.data
          )
        );
      }
    }
  };
</script>