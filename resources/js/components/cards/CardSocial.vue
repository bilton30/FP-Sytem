<template>
<q-card  bordered >
   <div class="centered-container ">
    <q-card class="bg-transparent no-shadow no-border" bordered>
      <q-card-section class="q-pa-none">
        <div class="row q-col-gutter-md">
          <div class="col-md-9">
            <div class="row no-wrap">
              <!-- <div v-for="(item, index) in items" :key="index" class="col-md-3  ">
                <q-item :style="`background-color: ${item.color1}; margin: 10px;`" class="q-pa-none">
                  <q-item-section v-if="icon_position === 'left'" side :style="`background-color: ${item.color2}`"
                                  class="q-pa-lg q-mr-none text-white">
                    <q-icon :name="item.icon" color="white" size="24px"></q-icon>
                  </q-item-section>
                  <q-item-section class="q-pa-md q-ml-none text-white">
                    <q-item-label class="text-white text-h6 text-weight-bolder">{{ item.value }}</q-item-label>
                    <q-item-label>{{ item.title }}</q-item-label>
                  </q-item-section>
                  <q-item-section v-if="icon_position === 'right'" side class="q-mr-md text-white">
                    <q-icon :name="item.icon" color="white" size="40px"></q-icon>
                  </q-item-section>
                </q-item>
              </div> -->
            </div>
          </div>
        </div>
      </q-card-section>
    </q-card>
  </div>
</q-card>
</template>
  
  <script>
  import {defineComponent} from 'vue'
  import {formattedPrice,formatNumberRounded} from '../../services/helper.js'
  
  export default defineComponent({
    name: "CardSocial",
    props: {
      icon_position: {
        required: false,
        default: "left",
      },
      data:Object,
    },
    data(){
        return{
            items:[
            {
              title: "Monthly Income",
              icon: "account_balance_wallet",
              value: "$ 20k",
              color1: "#546bfa",
              color2: "#3e51b5"
            },{
              title: "Monthly Income",
              icon: "payments",
              value: "20000",
              color1: "#546bfa",
              color2: "#3e51b5"
            },
            {
              title: "Weekly Sales",
              icon: "currency_exchange",
              value: "20",
              color1: "#3a9688",
              color2: "#3e51b5"
            },
            {
              title: "New Customers",
              icon: "monetization_on",
              value: "321 000 ",
              color1: "#7cb342",
              color2: "#3e51b5"
            },
            {
              title: "Active Users",
              icon: "person",
              value: "82",
              color1: "#f88c2b",
              color2: "#3e51b5"
            }
          ]
        }
    },
    mounted(){
//         pessoas.map((pessoa, index) => {
    this.items.map((item,index)=>{
    item.title = this.data[index].description  
    item.value = this.data[index].payment_sum_total
    })
// });

    },
    computed: {
       
    //   items: function () {
    //     return this.icon_position === "left"
    //       ? []
    //       : [
    //         {
    //           title: "Monthly Income",
    //           icon: "fas fa-dollar-sign",
    //           value: "$ 20k",
    //           color1: "#546bfa",
    //           color2: "#3e51b5"
    //         },{
    //           title: "Monthly Income",
    //           icon: "fas fa-dollar-sign",
    //           value: "20000",
    //           color1: "#546bfa",
    //           color2: "#3e51b5"
    //         },
    //         {
    //           title: "Weekly Sales",
    //           icon: "fas fa-chart-bar",
    //           value: "20",
    //           color1: "#3a9688",
    //           color2: "#3e51b5"
    //         },
    //         {
    //           title: "New Customers",
    //           icon: "fas fa-chart-line",
    //           value: "321",
    //           color1: "#7cb342",
    //           color2: "#3e51b5"
    //         },
    //         {
    //           title: "Active Users",
    //           icon: "person",
    //           value: "82",
    //           color1: "#f88c2b",
    //           color2: "#3e51b5"
    //         }
    //       ];
    //   }
    }
  })
  </script>
  <style>

  .centered-container {
    /* display: flex; */
  /* justify-content: center; */
  margin-left: 5%;
 
  }  @media (max-width: 768px) { /* Estilo para dispositivos com largura máxima de 768px (tablets e celulares) */
      .col-sm-6 {
        width: 100%; /* Defina a largura para 100% para ocupar a largura total do dispositivo */
      }
      .centered-container {
        margin-left: 0; /* Remova a margem à esquerda para que o conteúdo ocupe a largura total */
        margin-right: 0; /* Remova a margem à direita */
      }
    }
  </style>