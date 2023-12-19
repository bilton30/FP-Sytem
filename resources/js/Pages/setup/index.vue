<template>
  
  </template>
  
  <script>

  import {defineComponent,defineAsyncComponent} from 'vue'
  
  export default defineComponent({
    name: 'post',
    props:{
  
    },
    components: {

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
<style lang="scss">
@import "../../../sass/step.scss"
</style>
  