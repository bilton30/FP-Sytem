<template >
     <q-drawer  v-model="rightDrawerOpen" side="right" bordered  :width="230" style="height: calc(50% - 180px);" :breakpoint="400">
        <q-scroll-area  style="height: calc(100% - 180px); margin-top: 180px; border-right: 1px solid #ddd">
          <q-list padding>
            <q-item clickable v-ripple>
              <q-item-section avatar>
                <q-icon name="nightlight" />
              </q-item-section>

              <q-item-section>
                Dark Mode
              </q-item-section>
              <q-item-section avatar>
          <q-toggle color="blue" v-model="darkMode" @click="toggleDark(darkMode)" val="true" />
        </q-item-section>
            </q-item>

            <!-- <q-item  clickable v-ripple>
              <q-item-section avatar>
                <q-icon name="notifications" />
              </q-item-section>

              <q-item-section>
                Notifications
              </q-item-section>
            </q-item> -->
            <q-item clickable v-ripple @click="logout()" class="text-red-5">
              <q-item-section avatar>
                <q-icon name="logout" />
              </q-item-section>

              <q-item-section  >
                logout
               
              </q-item-section>
            </q-item>
          </q-list>
        </q-scroll-area>

        <q-img class="absolute-top" src="/images/material.png" style="height: 180px">
          <div class="absolute-bottom bg-transparent">
            <q-avatar size="100px" class="q-mb-sm">
              <img :src="user.avatar
                          ? user.avatar
                          :`/images/default-avatar.png`" >
              <q-btn round flat icon="edit"/>
            </q-avatar>
            <q-btn round flat icon="edit" color="light-green-14"  size="lg" @click="show" style="position: absolute; top: 68px; left: 80px;"/>
            <div class="text-weight-bold">{{user.name}}</div>
            <div>{{user.email}}</div>
          </div>
        </q-img>
    </q-drawer>
    <q-dialog ref="dialogRef" @hide="onDialogHide">
    <q-card class="q-dialog-plugin" style="width: 700px; max-width: 80vw;">
      <!--content-->
      <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
        <q-card class="card-bg text-white no-shadow" bordered>
          <q-card-section class="text-h6 ">
            <div class="text-h6">Edit Profile</div>
            <div class="text-subtitle2">Complete your profile</div>
          </q-card-section>
          <q-card-section class="q-pa-sm">
            <q-list class="row">
              <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <q-item-section side>
                  <q-avatar size="150px">
                    <img :src="user.avatar
                          ? user.avatar
                          :`/images/default-avatar.png`">
                          <div  style="position: absolute; top: 40px; left: 38px;" v-if="perfilLoading">
                            <q-spinner-ios color="primary"  size="1em" />
                            <q-tooltip :offset="[0, 8]">loding</q-tooltip>
                          </div>
                    <q-btn round flat icon="edit" color="green"  size="lg" @click="() => { this.$refs.avatar.click();  }
                    " style="position: absolute; top: 68px; left: 115px;"/>
                     <input type="file" @change="updateAvatar($event); perfilLoading=true" style="display: none" id="avatar" accept="image/*" ref="avatar" />
                  </q-avatar>
                </q-item-section>
                <!-- <q-item-section>
                  <q-btn label="change Password" class="text-capitalize" rounded color="info"
                         style="max-width: 120px"></q-btn>
                </q-item-section> -->
                <q-item-section>
                  <q-btn label="change Password" class="text-capitalize" @click="showPassowordChange=true" rounded color="secondary"
                         style="max-width: 150px"></q-btn>
                </q-item-section>
              </q-item>
              
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
              
              <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12" v-if="showPassowordChange">
                <q-item-section>
                  <q-input dark color="white" dense v-model="editedItem.currentPassword" label=" Current Password *" :type="isPwd.current ? 'password' : 'text'" :rules="[ val => val && val.length > 0 || 'Please type your current password']">
                      <template v-slot:append>
                        <q-icon
                          :name="isPwd.current ? 'visibility_off' : 'visibility'"
                          class="cursor-pointer"
                          @click="isPwd.current = !isPwd.current"
                        />
                      </template>
                    </q-input>
                  </q-item-section>
              </q-item>

              <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12" v-if="showPassowordChange">
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

              <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12" v-if="showPassowordChange">
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
</template>
<script>
import {Dark,useDialogPluginComponent } from "quasar";
import { useForm } from '@inertiajs/vue3'
import {defineComponent} from 'vue'
import axios from "axios";
import {validateField} from '../../services/validations.js'

export default defineComponent({
    name:'Right bar',
    props :{
      rightDrawerOpen:Boolean,
      user: Object,
   },
    data () {
      return {
        perfilLoading:false,
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
          showPassowordChange:false,
          darkMode:false,
      }
    },watch: {
   
      user: function (newValue) {
        this.editedItem.name = newValue.name;
        this.editedItem.email = newValue.email;
    }
  },
    mounted() {
    
      this.editedItem.name = this.user.name;
    this.editedItem.email = this.user.email;
      this.darkMode = localStorage.getItem("laraquasar@theme")
        ? localStorage.getItem("laraquasar@theme") == "dark"
        : false;
      this.toggleDark(this.darkMode)
  
    },
    emits: [
      // REQUIRED
      'ok', 'hide','update:user'
    ],
    methods: {
      updateAvatar(event) {
        if (event.target.files && event.target.files[0]) {
        const file = event.target.files[0];
        // this.loading = true;
        // console.log(file);
        const formData = new FormData();
        formData.append("avatar", file);
        axios
          .post("/custom-update", formData, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then(({ data: result }) => {
            if (result.success) {
              const reader = new FileReader();
              reader.onload = (e) => {
                this.user.avatar = e.target.result;
              };
              reader.readAsDataURL(file);
            
              // this.$swal("Sucesso!", "" + result.message, "success");
              this.$q.dialog({
              title: 'Success',
              message: ''+ result.message,
            })
            } else {
              // console.log( result.message);
              this.$q.dialog({
              title: 'Error',
              message: ''+ result.message,
            })
            }
            this.perfilLoading=false
          })
          .catch((error) => {
            this.perfilLoading=false
            console.log( error.response.message);
            // console.log( result.message);
              this.$q.dialog({
              title: 'Error',
              message: ''+ error.response.message,
            })
          });
      }
    },
      show () {
        this.$refs.dialogRef.show()
      },
  
      // following method is REQUIRED
      // (don't change its name --> "hide")
      hide () {
        this.$refs.dialogRef.hide()
      },
  
      onDialogHide () {
        // required to be emitted
        // when QDialog emits "hide" event
        this.$emit('hide')
      },
   
      onOKClick () {
      
        this.$emit('ok')
        if(this.showPassowordChange==true){
        if(!validateField(this,this.editedItem,['name','email'])){
        return
          }else if(this.newPassword==this.confirmPassword){
            this.$q.notify({
                color: 'red-5',
                textColor: 'white',
                icon: 'warning',
                message: 'the new password is different from the confirmation'
              })
          }
         
        }
 
      axios
        .post("/custom-update", this.editedItem)
        .then(({ data: result }) => {
          if (result.success) {
            // aler0t("ok");
            window.User = result.data;
      
            this.$emit('update:user', result.data);
            // console.log( window.User)
            console.log( this.user.name)
            this.editedItem.name = this.user.name;
            this.editedItem.email = this.user.email;
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
          // console.log(error)
          this.loading=false
          this.updatingUser = false;
          this.$q.dialog({
              title: 'Error',
              message: ''+  error.response.message,
            })
            // this.dialog = false;
        })
        
      },
  
      onCancelClick () {
        // we just need to hide the dialog
        this.hide()
      },
      async logout(){
          document.querySelector("#logout").submit();
      },
      toggleDark(darkMode){
          // console.log(darkMode)
          this.darkMode = darkMode
          localStorage.setItem("laraquasar@theme", darkMode ? "dark" : "light");
          Dark.set(darkMode)

      },
 
    }
  })
</script>