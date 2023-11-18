<template>
    <q-page padding>
      <h4 class="text-h2">Productos</h4>
      <q-form
        class="row q-col-gutter-md"
        @submit.prevent="onSubmit"
        ref="myForm"
      >
        <q-input
          label="Nombre de producto"
          class="col-12 col-sm-6"
          v-model="nombre"
          lazy-rules
          :rules="[(val) => (val && val.length > 0) || 'Campo vacío']"
        />
        <q-input
          label="Referencia de producto"
          class="col-12 col-sm-6"
          v-model="referencia"
          lazy-rules
          :rules="[(val) => (val && val.length > 0) || 'Campo vacío']"
        />
        <q-input
          label="Descripción de producto"
          class="col-12 col-sm-6"
          v-model="descripcion"
          lazy-rules
          :rules="[(val) => (val && val.length > 0) || 'Campo vacío']"
        />
        <q-input
          label="Precio de producto"
          class="col-12 col-sm-6"
          type="number"
          v-model="precio"
          lazy-rules
          :rules="[(val) => (val && val.length > 0) || 'Campo vacío']"
        />
        
        <div class="col-12">
          <q-btn label="submit" type="submit" color="primary" />
        </div>
      </q-form>

    </q-page>
  </template>



  <script>
  import { useQuasar } from "quasar";
  import ListaProductos from "src/pages/ListComponent.vue";
  import { ref } from "vue";
  export default {
  
    setup() {
      const $q = useQuasar();
      const myForm = ref(null);
  
      const nombre = ref(null);
      const referencia = ref(null);
      const descripcion = ref(null);
      const precio = ref(null);

      const onSubmit = () => {
       
          $q.notify({
            color: "green-4",
            textColor: "white",
            icon: "cloud_done",
            message: "Submitted",
          });

      };
      
    },
    data(){
      return{
        nombre:'', referencia:'', descripcion:'', precio:'', url:'http://localhost:9000/#/addProduct'
      }
    },
    methods:{
      guardar(){
        event.preventDefault();
          var parametros = {nombre:this.nombre.trim(), descripcion: this.descripcion.trim(), precio:this.precio}
          enviarSolicitud('POST', parametros, this.url, 'REGISTRADO CON EXITO');
        }
    }
  };
  </script>