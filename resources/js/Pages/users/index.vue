<template>
    <app>
      <q-page class="q-pa-sm" >
        
        <table-actions :data="users" :columns="columns" @action="performAction"  tableName="Users" buttonName="New User" class="q-mt-lg  border" ></table-actions>
     
        <q-dialog ref="dialogRef" @hide="onDialogHide">
    <q-card class="q-dialog-plugin" style="width: 700px; max-width: 80vw;">
      <!--content-->
      <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
        <q-card class="card-bg text-white no-shadow" bordered>
          <q-card-section class="text-h6 ">
            <div class="text-h6">create User</div>
            <div class="text-subtitle2">Complete  profile</div>
          </q-card-section>
          <q-card-section class="q-pa-sm">
            <q-list class="row">

              <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <q-item-section>
                  <q-input dark color="white" dense v-model="editedItem.name" label="Full Name *"  lazy-rules
                  :rules="[ val => val && val.length > 0 || 'Please type your full name']"/>
                </q-item-section>
              </q-item>
              <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <q-item-section>
                  <q-input dark color="white" dense v-model="editedItem.email" label="Email *"  :rules="[ val => val && val.length > 0 || 'Please type your email']"/>
                </q-item-section>
              </q-item>

              <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                <q-item-section>
                  <q-input dark color="white" dense v-model="editedItem.newPassword" label=" New Password *" :type="isPwd.new ? 'password' : 'text'" :rules="[ val => val && val.length > 0 || 'Please type your New Password']">
                      <template v-slot:append>
                        <q-icon
                          :name="isPwd.new ? 'visibility_off' : 'visibility'"
                          class="cursor-pointer"
                          @click="isPwd.new  = !isPwd.new "
                        />
                      </template>
                    </q-input>
                  </q-item-section>
              </q-item>

              <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                <q-item-section>
                  <q-input dark color="white" dense v-model="editedItem.confirmPassword" label=" Confirme New Password *" :type="isPwd.confirme ? 'password' : 'text'" :rules="[ val => val && val.length > 0 || 'Please confirme New Password']">
                      <template v-slot:append>
                        <q-icon
                          :name="isPwd.confirme ? 'visibility_off' : 'visibility'"
                          class="cursor-pointer"
                          @click="isPwd.confirme  = !isPwd.confirme "
                        />
                      </template>
                    </q-input>
                  </q-item-section>
              </q-item>

            </q-list>
            <br>
          </q-card-section>
        </q-card>
      </div>
      
      <!-- end content-->

      <!-- buttons example -->
      <q-card-actions align="right">
        <small  class="bg-secondary" style="position: absolute; left:20px;">* Indicates required field</small>
        <q-btn color="negative" label="Cancel" @click="onCancelClick" />
        <q-btn :disable="loading"  class="text-capitalize bg-info text-white" label="Update Info" @click="onOKClick();loading=true" >
          <div v-if="loading">
            <q-spinner-ios
              color="white"
              size="1.1em"
            />
            <q-tooltip :offset="[0, 8]">loading</q-tooltip>
          </div>
        </q-btn>
       
      </q-card-actions>
    </q-card>
  </q-dialog>
        
    </q-page>
    </app>
  </template>
  
  <script>
  import app from '../../App.vue' 
  import {defineComponent,defineAsyncComponent} from 'vue'
  
  export default defineComponent({
    name: 'users',
    props:{
      data:Object,
  
    },
    components: {

  TableActions: defineAsyncComponent(() => import('../../components/tables/TableActions.vue')),

     app,
    },
    data () {
      return {
        fieldNotEmpty:true,
        loading:false,
        editedItem: {
          currentPassword:"",
          newPassword: "",
          confirmPassword: "",
          name: "",
          email: "",
      },
        isPwd:[
            {
            current:true,
            new:true,
            confirme:true
            }
        ],
        users:[],
        button : [
            { action:"delete", icon:"delete", color:"red"},
            { action:"edit", icon:"edit"}
        ],
        badge:{
            type: 'info',
            value: '',
        },
           
    
        columns:[
            {name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left'},
            {name: 'email', label: 'Email', field: 'email', sortable: true, align: 'left'},
            {name: 'badge', label: 'Roles', field: 'badge', sortable: true, align: 'left'},
            {name: 'Action', label: '', field: 'action', sortable: false, align: 'center'}
        ],

  
      }
    }, emits: [
      // REQUIRED
      'ok', 'hide',
    ],
    mounted() {
            
     this.users = this.data.map((item)=>({
        ...item,
        button:this.button,
        badge: item.roles.map((role) => ({
            type: 'info',
            value: role.name, 
        })),
       
    }))
    console.log(this.users)
    },
  
    methods: {
        
        performAction(action){
            if (action === 'create') {
                this.$refs.dialogRef.show()
            } else if (action === 'update') {
                //
            } else if (action === 'edit') {
                this.edit()
            } else if (action === 'delete') {
                this.delete()
            } else if (action === 'show') {
               //
            }
        },
        edit(){
            console.log('funcionando, editando..')
        },
        create(){
            axios.post("/custom-update", this.editedItem).then(({ data: result }) => {
            if (result.success) {
              
                this.$q.dialog({
                title: 'Success',
                message: ''+ result.message,
                })
            } else {
                console.log("Erro");
                this.$q.dialog({
                title: 'Error',
                message: ''+ result.message,
                })
            }
            this.loading=false
            this.hide()
            })
        .catch((error) => {
        
          this.loading=false
          this.updatingUser = false;
          this.$q.dialog({
              title: 'Error',
              message: ''+  error.response.message,
            })
            // this.dialog = false;
        })
        },
        delete(){
            console.log('funcionando, apagando..')
        },
        onDialogHide () {
        // required to be emitted
        // when QDialog emits "hide" event
        this.$emit('hide')
      },
   
    }
  
  
  })
  </script>