<template>
  <app>
    <q-page class="q-pa-sm">
      <!-- <p v-can="'user-index'" style="color: brown;">Este parágrafo só será exibido se o usuário tiver permissão de leitura</p> -->

      <table-actions :data="users" :columns="table.columns" @action="performAction" :tableName="$t('Users')"
        buttonName="New User" permission="roles-create" class="q-mt-lg  border"></table-actions>
      <q-dialog ref="dialog" @hide="close('dialog')">
        <q-card class="q-dialog-plugin" style="width: 700px; max-width: 80vw;">
          <!--content-->
          <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            <q-card class="card-bg text-white no-shadow" bordered>
              <q-card-section class="text-h6 ">
                <div class="text-h6">{{ $t('Create User') }}</div>
                <div class="text-subtitle2">{{ $t('Complete profile') }}</div>
              </q-card-section>
              <q-card-section class="q-pa-sm">
                <div class="alert alert-danger" v-if="errors.length" id="alert">
                  <b>{{ $t("Please correct the following error(s)") }}</b>
                  <ul class="alert-ul">
                    <li v-for="error in errors" key="error">{{ replacePoints(error) }}</li>
                  </ul>
                </div>
                <q-list class="row">

                  <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <q-item-section>
                      <q-input dark color="white" dense v-model="editedItem.name" lazy-rules
                        :label="`${$t('Full Name')} *`"
                        :rules="[val => val && val.length > 0 || $t('Please type your full name')]" />
                    </q-item-section>
                  </q-item>
                  <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <q-item-section>
                      <q-select fill v-model="editedItem.roles" multiple :options="roles" option-value="name"
                        option-label="name" :label="`${$t('Role')}*`" use-chips
                        :rules="[val => val && val.length > 0 || $t('Please select the Role')]" />
                    </q-item-section>
                  </q-item>
                  <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <q-item-section>
                      <q-input dark color="white" dense v-model="editedItem.email" :label="`${$t('Email')} *`"
                        :rules="[val => val && val.length > 0 || $t('Please type your email')]" />
                    </q-item-section>
                  </q-item>

                  <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <q-item-section>
                      <q-input dark color="white" dense v-model="editedItem.password" :label="`${$t('New Password')} *`"
                        :type="isPwd.new ? 'password' : 'text'"
                        :rules="[val => val && val.length > 0 || $t('Please type your New Password')]">
                        <template v-slot:append>
                          <q-icon :name="isPwd.new ? 'visibility_off' : 'visibility'" class="cursor-pointer"
                            @click="isPwd.new = !isPwd.new" />
                        </template>
                      </q-input>
                    </q-item-section>
                  </q-item>

                  <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <q-item-section>
                      <q-input dark color="white" dense v-model="editedItem.confirmPassword"
                        :label="`${$t('Confirme New Password')} *`" :type="isPwd.confirme ? 'password' : 'text'"
                        :rules="[val => val && val.length > 0 || $t('Please confirme New Password')]">
                        <template v-slot:append>
                          <q-icon :name="isPwd.confirme ? 'visibility_off' : 'visibility'" class="cursor-pointer"
                            @click="isPwd.confirme = !isPwd.confirme" />
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
            <small class="bg-secondary" style="position: absolute; left:20px;">* {{ $t('Indicates required field') }}
            </small>
            <q-btn color="negative" label="Cancel" @click="close('dialog')" />
            <q-btn :disable="loading" class="text-capitalize bg-info text-white" label="Submit"
              @click="save(); loading = true">
              <div v-if="loading">
                <q-spinner-ios color="white" size="1.1em" />
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
import { defineComponent, defineAsyncComponent } from 'vue'
import { replacePoints, prepareForm } from '../../services/helper.js'
import axios from "axios";
export default defineComponent({
  name: 'users',
  props: {
    data: Object,

  },
  components: {

    TableActions: defineAsyncComponent(() => import('../../components/tables/TableActions.vue')),

    app,
  },
  data() {
    return {
      errors: [],
      fieldNotEmpty: true,
      loading: false,
      editedItem: {
        // currentPassword: "",
        password: "",
        confirmPassword: "",
        name: "",
        email: "",
        roles: ["adm"],

      },
      defaultItem: {
        // currentPassword: "",
        password: "",
        confirmPassword: "",
        name: "",
        email: "",
        roles: []
      },
      roles: [],
      isPwd: [
        {
          current: true,
          new: true,
          confirme: true
        }
      ],
      users: [],
      table: {
        button: [
          { action: "delete", icon: "delete", color: "red", permission: "user-destroy" },
          { action: "edit", icon: "edit", permission: "user-edit" }
        ],
        columns: [
          { name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left' },
          { name: 'email', label: 'Email', field: 'email', sortable: true, align: 'left' },
          { name: 'badge', label: 'Users', field: 'badge', sortable: true, align: 'left' },
          { name: 'Action', label: '', field: 'action', sortable: false, align: 'center' }
        ],
      },
      // badge:{
      //     type: 'info',
      //     value: '',
      // },
    }
  }, emits: [
    // REQUIRED
    'ok', 'hide',
  ],
  mounted() {
    this.users = this.data.map((item) => ({
      ...item,
      button: this.table.button,
      badge: item.roles.map((role) => ({
        type: 'info',
        value: role.name,
      })),
    }))
    this.getRoles()
  },

  methods: {
    async initialize() {
      this.users = await axios.get("/users").then((result) => {
        return result.data.map((item) => ({
          ...item,
          button: this.table.button,
          badge: item.roles.map((role) => ({
            type: 'info',
            value: role.name,
          })),
        }))
      });
    },
    getRoles() {
      axios.get("/users/create").then((result) => {
        this.roles = result.data.map((role) => {
          return role.name
        }
        );
      });
    },
    replacePoints(string) {
      return replacePoints(string);
    },
    performAction(action, item) {

      if (action === 'create') {
        this.$refs.dialog.show()
      } else if (action === 'update') {

      } else if (action === 'edit') {
        this.$q.loading.show({
          message: this.$t("Please wait"),
          boxClass: 'bg-grey-4 text-grey-9',
          spinnerColor: 'primary'
        })
        this.edit(item)

      } else if (action === 'delete') {
        this.deleteItem(item)

      } else if (action === 'show') {
        this.$q.loading.show({
          message: this.$t("Please wait"),
          boxClass: 'bg-grey-4 text-grey-9',
          spinnerColor: 'primary'
        })
        this.show(item)
      }
    },

    async edit(item) {
      this.editedItem = await axios
        .get("/users/" + item.id + "/edit")
        .then((result) => {

          return {
            id: result.data.id,
            name: result.data.name,
            email: result.data.email,
            roles: result.data.roles.map((role) => {
              return role.name

            })
          }
        })
      console.log(this.editedItem)
      this.editedIndex = this.users.indexOf(item);
      this.$q.loading.hide()
      this.$refs.dialog.show()
    },
    editConfirm() {
      let formData = prepareForm(this.editedItem, 'patch')
      this.loading = true;
      axios
        .post("/users/" + this.editedItem.id, formData, {})
        .then((response) => {
          this.loading = false;
          this.initialize()
          this.close('dialog');
          this.$q.dialog({
            title: 'Success',
            message: '' + response.data.message,
          })
        })
        .catch((error) => {
          this.loading = false;
          if (error.response.data.errors === undefined) {
            this.close('dialog');
            this.$q.dialog({
              title: "Erro!",
              text: "" + error.response.data.message,
              icon: "error"
            });
          } else {
            window.scrollTo(0, 0);
            this.errors = error.response.data.errors
          }
        });
    },
    createConfirm() {
      let formData = prepareForm(this.editedItem)
      this.loading = true;
      axios
        .post("/users", formData, {})
        .then((response) => {
          this.initialize()
          this.close('dialog');
          this.loading = false;
          this.$q.dialog({
            title: 'Success',
            message: '' + response.data.message,
          })
        })
        .catch((error) => {
          this.loading = false;
          if (error.response.data.errors === undefined) {
            this.close('dialog');
            this.$q.dialog({
              title: "Erro!",
              text: "" + error.response.data.message,
              icon: "error"
            });
          } else {
            window.scrollTo(0, 0);
            this.errors = error.response.data.errors
          }
        });
    },

    show(item) {
      this.loading = true;
      axios.get("/users/" + item.id).then((result) => {

        this.editedItem.name = result.data.role.name;
        this.editedItem.guard_name = result.data.role.guard_name;
        this.editedItem.permission = result.data.rolePermissions.map(
          (permission) => {
            return permission;
          }
        );
        this.$q.loading.hide()
        this.$refs.dialogShow.show()
        this.loading = false;
      });
    },

    deleteItem(item) {
      this.$q.dialog({
        title: 'Confirm',
        message: this.$t('Are you sure you want to delete this item'),
        cancel: true,
        persistent: true
      }).onOk(() => {
        this.editedIndex = this.users.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.deleteConfirm()
        this.$q.loading.show({
          message: this.$t("Please wait"),
          boxClass: 'bg-grey-4 text-grey-9',
          spinnerColor: 'primary'
        })
      })

    },

    deleteConfirm() {
      let formData = new FormData();
      this.loading = true;
      formData.append("_method", "DELETE");
      axios
        .post("/users/" + this.editedItem.id, formData, {})
        .then((response) => {
          this.$q.loading.hide()
          this.$q.dialog({
            title: 'Success',
            message: '' + response.data.message,
          })
          this.users.splice(this.editedIndex, 1);
        })
        .catch((error) => {
          this.$q.loading.hide()
          // console.log(error.response.data);
          this.$q.dialog({
            title: 'Error',
            message: '' + error.response.data.message,
          })
        });

    },

    close(dialogRef) {
      this.loading = false;
      this.$refs[dialogRef].hide();
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    save() {
      if (this.editedIndex > -1) {
        this.editConfirm()
        Object.assign(this.users[this.editedIndex], this.editedItem);
      } else {
        this.createConfirm()
      }
    }




  }


})
</script>