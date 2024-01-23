<template>
  <q-card class="no-shadow text-grey-8 bg-grey-2" bordered>
    <q-card-section>
      <div class="text-h6 text-grey-8" v-if="tableName">
        {{ tableName }}
        <q-btn :label="$t(buttonName)" color="blue" @click="emitAction('create')" v-if="(buttonName)"
          class="float-right text-capitalize  shadow-3" icon="add" />
      </div>
    </q-card-section>
    <q-separator></q-separator>
    <q-card-section class="q-pa-none ">
      <q-table :rows="data" :columns="columns" hide-bottom class="no-shadow text-grey-8 bg-grey-2 border " bordered>
        <template v-slot:header="props">
        <q-tr :props="props">
          <q-th
            v-for="col in props.cols"
            :key="col.name"
            :props="props"
          >
          {{ col.label == "" ? col.label : $t(col.label)  }}

          </q-th>
        </q-tr>
      </template>
        <template v-slot:body-cell-Name="props">
          <q-td :props="props">
            <q-item style="max-width: 420px">
              <!-- <q-item-section avatar>
                <q-avatar>
                  <img :src="props.row.avatar">
                </q-avatar>
              </q-item-section> -->

              <q-item-section>
                <q-item-label>{{ props.row.name }}</q-item-label>
              </q-item-section>
            </q-item>
          </q-td>
        </template>
        <!-- <template v-slot:body-cell-total="props">
          <q-td :props="props">
            {{ format( props.row.payment_sum_total ) }}
          </q-td>
        </template> -->
        <template v-slot:body-cell-Action="props">
          <q-td :props="props">
            <div style="display: flex; padding:  1%;">
              <div v-for="item in props.row.button " :key="item">
                <q-btn :icon="item.icon" size="sm" :color="item.color" @click="emitAction(item.action, props.row)"
                  :v-can="item.permission" flat dense />
              </div>
            </div>
            <!-- <q-btn icon="delete" size="sm" class="q-ml-sm" flat dense/> -->
          </q-td>
        </template>
        <template v-slot:body-cell-badge="props">
          <q-td :props="props">
            <q-item>
              <q-item-section>

                <q-item-label v-if="Array.isArray(props.row.badge)">
                  <div v-for="item in props.row.badge" :key="item">
                    <q-chip class=" text-white text-capitalize" dense :label="item.value" color="info"
                      v-if="item.type == 'info'"></q-chip>

                    <q-chip class=" text-white text-capitalize" dense :label="item.value" color="positive"
                      v-if="item.type == 'success'"></q-chip>

                    <q-chip class=" text-white text-capitalize" dense :label="item.value" color="warning"
                      v-if="item.type == 'warning'"></q-chip>
                    <q-chip class=" text-white text-capitalize" dense :label="item.value" color="negative"
                      v-if="item.type == 'error'"></q-chip>
                  </div>
                </q-item-label>

                <q-item-label v-else>

                  <q-chip class="text-white text-capitalize" dense :label="props.row.badge.value" color="info"
                    v-if="props.row.badge.type == 'info'"></q-chip>

                  <q-chip class=" text-white text-capitalize" dense :label="props.row.badge.value" color="positive"
                    v-if="props.row.badge.type == 'success'"></q-chip>

                  <q-chip class=" text-white text-capitalize" dense :label="props.row.badge.value" color="warning"
                    v-if="props.row.badge.type == 'warning'"></q-chip>
                  <q-chip class=" text-white text-capitalize" dense :label="props.row.badge.value" color="negative"
                    v-if="props.row.badge.type == 'error'"></q-chip>

                </q-item-label>
              </q-item-section>
            </q-item>
          </q-td>
        </template>
      </q-table>
    </q-card-section>
  </q-card>
</template>

<script>
import { defineComponent } from 'vue'
import { formattedPrice, formattedPricePrefix } from '../../services/helper.js'
export default defineComponent({
  name: "TableActions",

  props: {
    data: Object,
    columns: Object,
    tableName: String,
    buttonName: String,

  },
  data() {
    return {

    }
  },
  methods: {
    emitAction(action, item = null) {
      this.$emit('action', action, item);
    },
    format(value) {
      return formattedPricePrefix(value)
    },
    getColor(val) {
      if (val > 70 && val <= 100) {
        return 'green'
      } else if (val > 50 && val <= 70) {
        return 'blue'
      }
      return 'red'
    }
  },
  mounted() {


  }
})


</script>

<style scoped></style>