<template>
  <app>
    <q-page class="q-pa-sm" >
    
    
      <!-- <card-social icon_position="right" class="text-grey-8 bg-grey-2 border" :data="items" />  -->
      <!-- <table-actions :data="items" :columns="columns" class="q-mt-lg  border" ></table-actions> -->
      
    
    </q-page>
  </app>
</template>

<script>
import { Link } from '@inertiajs/vue3'
import app from '../App.vue'
import {defineComponent,defineAsyncComponent} from 'vue'
import {formattedPrice,formattedPricePrefix} from '../services/helper.js'
export default defineComponent({
  name: 'post',
  props:{
    data:Object,

  },
  components: {
    CardProduct: defineAsyncComponent(() => import('../components/CardProduct.vue')),
    TableActions: defineAsyncComponent(() => import('../components/tables/TableActions.vue')),
    CardSocial: defineAsyncComponent(() => import("../components/cards/CardSocial.vue")),
   app,
  },
  data () {
    return {
      tab:'cashier',
      items:[],
      button : [
            { action:"show", icon:"visibility"},
         
        ],
      columns:[
                  {name: 'description', label: 'Description', field: 'description', sortable: true, align: 'left'},
                  {name: 'No Transactions', label: 'No Transactions', field: 'payment_count', sortable: true, align: 'left'},
                  {name: 'badge', label: 'Total', field: 'badge', sortable: true, align: 'left'},
                  {name: 'Action', label: '', field: 'Action', sortable: false, align: 'center'}
                ]

    }
  },
  mounted() {

  // this.data.map((item,index)=>{
   
  //   item.payment_sum_total = formattedPricePrefix(item.payment_sum_total)
  //   })
    
    // this.items = this.data.map((item)=>({
    //     ...item,
    //     button:this.button,
    //     payment_sum_total: formattedPricePrefix(item.payment_sum_total),
    //     badge: {
    //         type: 'info',
    //         value: formattedPricePrefix(item.payment_sum_total), 
    //     },
       
    // }))
    // console.log(this.items)
  },

  methods: {

 
  }


})
</script>

<style>
  .q-table thead, .q-table tr, .q-table th, .q-table td {
    border-color: rgba(0, 0, 0, 0.12) !important;
}   
</style>
