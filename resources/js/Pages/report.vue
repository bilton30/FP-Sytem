<template>
    <app>
      <div class="q-pa-md" >
      <div class="q-gutter-y-md "    >
        <q-card>
          <q-tabs
            v-model="tab"
            dense
            :class="$q.dark.isActive ? 'text-white' : ' text-grey-8 bg-grey-2'" 
            active-color="primary"
            indicator-color="primary"
            align="justify"
           
          >
            <q-tab name="cashier" label="Cashier" />
            <q-tab name="transactions" label="Transactions" />
            <!-- <q-tab name="movies" label="Movies" /> -->
          </q-tabs>
  
          <q-separator />
  
          <q-tab-panels v-model="tab" animated :style="$q.dark.isActive ? 'background: #24292e !important':''">
            <q-tab-panel name="cashier" >
              <!-- <div class="text-h6">Cashier</div> -->
              <table-actions :data="data" class="q-mt-lg"></table-actions>
            </q-tab-panel>
  
            <q-tab-panel name="transactions">
              <div class="text-h6">Transactions</div>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
  
            </q-tab-panel>
  
            <!-- <q-tab-panel name="movies">
              <div class="text-h6">Movies</div>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </q-tab-panel> -->
          </q-tab-panels>
        </q-card>
  
      
      </div>
    </div>
    </app>
  </template>
  
  <script>
  import app from '../App.vue'
  import {defineComponent,defineAsyncComponent} from 'vue'
  
  export default defineComponent({
    name: 'post',
    props:{
      data:Object,
  
    },
    components: {
      CardProduct: defineAsyncComponent(() => import('../components/CardProduct.vue')),
      TableActions: defineAsyncComponent(() => import('../components/tables/TableActions.vue')),
     app,
    },
    data () {
      return {
        tab:'cashier'
  
      }
    },
    mounted() {
    console.log(this.data)
    },
  
    methods: {
  
   
    }
  
  
  })
  </script>
  
  <style>
  </style>
  