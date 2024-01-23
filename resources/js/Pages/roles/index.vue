<template>
  <app>
    <q-page class="q-pa-sm">
      <!-- <p v-can="'role-index'" style="color: brown;">Este parágrafo só será exibido se o usuário tiver permissão de leitura</p> -->
      <table-actions :data="roles" :columns="table.columns" @action="performAction" :tableName="$t('Roles')"
        buttonName="New Role" class="q-mt-lg  border"></table-actions>
      <q-dialog ref="dialog" @hide="close('dialog')">
        <q-card class="q-dialog-plugin" style="width: 500px; max-width: 80vw;" ref="dialogContainer">
          <!--content-->
          <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            <q-card class="card-bg text-white no-shadow" bordered>
              <q-card-section class="text-h6 ">
                <div class="text-h6">{{ $t("create Roles") }}</div>
                <!-- <div class="text-subtitle2">Complete profile</div> -->
              </q-card-section>
              <q-card-section class="q-pa-sm">
                <div class="alert alert-danger" v-if="errors.length" id="alert">
                  <b>{{ $t("Please correct the following error(s)") }}</b>
                  <ul class="alert-ul">
                    <li v-for="error in errors" key="error">{{ replacePoints(error) }}</li>
                  </ul>
                </div>
                <q-list class="row">
                  <q-item class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <q-item-section>
                      <q-input dark color="white" dense v-model="editedItem.name" :label="`${$t('Role Name')} *`"
                        lazy-rules :rules="[val => val && val.length > 0 || $t('Please type role name')]"
                        style="margin-top: 15px;" />
                    </q-item-section>
                  </q-item>
                  <q-item class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <q-item-section>
                      <q-select fill v-model="editedItem.guard_name" :options="guard_name" :label="`${$t('Guard Name')}
                        *`" @update:model-value="selectGuard(editedItem.guard_name)"
                        :rules="[val => val && val.length > 0 || $t('Please type guard name : api ou web')]" />
                      <!-- <q-input dark color="white" dense v-model="editedItem.guard_name"  label="Guard Name *" value="web"
                        :rules="[val => val && val.length > 0 || 'Please type guard name : api ou web']" /> -->
                    </q-item-section>
                  </q-item>
                  <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <q-item-section>
                      <h5 class="ml-0 mr-0 pb-0 d-flex justify-content-between" style="margin: 0px;">
                        {{ $t("Permissions") }}
                        <q-checkbox v-model="selected" color="primary" @update:model-value="selectItems"> </q-checkbox>
                      </h5>
                    </q-item-section>
                  </q-item>
                  <q-item class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
                    <q-item-section v-if="temp_permission.length > 0" ref="dialogContainer">
                      <q-item-label v-for="(item, index) in temp_permission" :key="index">
                        <q-checkbox v-model="editedItem.permission" v-bind:false-value="0" v-bind:true-value="`${index}`"
                          :label="item.name" color="primary" :val="item.id" hide-details>
                        </q-checkbox>
                      </q-item-label>
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
            <small class="bg-secondary" style="position: absolute; left:20px;">* {{ $t("Indicates required field") }}
            </small>
            <q-btn color="negative" label="Cancel" @click="close('dialog')" />
            <q-btn :disable="loading" class="text-capitalize bg-info text-white" label="Submit"
              @click="save(), loading = true">
              <div v-if="loading">
                <q-spinner-ios color="white" size="1.1em" />
                <q-tooltip :offset="[0, 8]">loading</q-tooltip>
              </div>
            </q-btn>
          </q-card-actions>
        </q-card>
      </q-dialog>
      <!--principal dialog/-->
      <q-dialog ref="dialogShow" @hide="close('dialogShow')">
        <q-card class="q-dialog-plugin" style="width: 500px; max-width: 80vw;" ref="dialogContainer">
          <!--content-->
          <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            <q-card class="card-bg text-white no-shadow" bordered>
              <q-card-section class="text-h6 ">
                <div class="text-h6">{{ $t("Show Roles") }}</div>
                <!-- <div class="text-subtitle2">Complete profile</div> -->
              </q-card-section>
              <q-card-section class="q-pa-sm">
                <q-list class="row">
                  <q-item class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <q-item-section>
                      <q-input dark color="white" dense v-model="editedItem.name" disable :label="$t('Role Name')"
                        lazy-rules :rules="[val => val && val.length > 0 || 'Please type role name']"
                        style="margin-top: 15px;" />
                    </q-item-section>
                  </q-item>
                  <q-item class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <q-item-section>
                      <q-select fill v-model="editedItem.guard_name" disable :options="guard_name"
                        :label="$t('Guard Name')" @update:model-value="selectGuard(editedItem.guard_name)" />
                      <!-- <q-input dark color="white" dense v-model="editedItem.guard_name"  label="Guard Name *" value="web"
                        /> -->
                    </q-item-section>
                  </q-item>
                  <q-item class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <q-item-section>
                      <h5 class="ml-0 mr-0 pb-0 d-flex justify-content-between" style="margin: 0px;">
                        {{ $t("Permissions") }}
                      </h5>
                    </q-item-section>
                  </q-item>
                  <q-item class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
                    <q-item-section v-if="editedItem.permission.length > 0" ref="dialogContainer">
                      <q-item-label v-for="(item, index) in editedItem.permission" :key="index">
                        <q-checkbox v-model="editedItem.permission[index]" v-bind:false-value="0"
                          v-bind:true-value="`${index}`" :label="item.name" color="primary" :val="1" disable hide-details>
                        </q-checkbox>
                      </q-item-label>
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
            <small class="bg-secondary" style="position: absolute; left:20px;">* {{ $t("Indicates required field") }}
            </small>
            <q-btn color="negative" label="Cancel" @click="close('dialogShow')" />

          </q-card-actions>
        </q-card>
      </q-dialog>
    </q-page>
  </app>
</template>
<script>
import app from '../../App.vue'
import { defineComponent, defineAsyncComponent } from 'vue'
import { replacePoints } from '../../services/helper.js'
import { scroll } from 'quasar'
import axios from "axios";

export default defineComponent({
  name: 'roles',
  props: {
    data: Object,
  },
  components: {
    TableActions: defineAsyncComponent(() => import('../../components/tables/TableActions.vue')),
    app,
  },
  props: {
    data: Object,
  },
  data() {
    return {
      errors: [],
      fieldNotEmpty: true,
      loading: false,
      selected: false,
      temp_permission: [],
      guard_name: ['web', 'api'],
      editedItem: {
        guard_name: "web",
        name: "",
        permission: [],
      },
      defaultItem: {
        guard_name: "web",
        name: "",
        permission: [],
      },
      isPwd: [
        {
          current: true,
          new: true,
          confirme: true
        }
      ],
      roles: [],
      table: {
        button: [
          { action: "delete", icon: "delete", color: "red", permission: "user-destroy" },
          { action: "edit", icon: "edit", permission: "user-edit" },
          { action: "show", icon: "visibility", permission: "user-show" }
        ],
        columns: [
          { name: 'name', label: "Name", field: 'name', sortable: true, align: 'left' },
          { name: 'badge', label: 'Roles', field: 'badge', sortable: true, align: 'left' },
          { name: 'Action', label: '', field: 'action', sortable: false, align: 'center' }
        ],
      },
    }
  }, emits: [
    // REQUIRED
    'ok', 'hide',
  ],
  mounted() {

    this.roles = this.data.map((item) => ({
      ...item,
      button: this.table.button,
      badge: {
        type: 'info',
        value: item.guard_name,
      }
    }))

    this.getPermissions()
    // this.editedItem.permission.filter(value => value !== null);
    // console.log(this.editedItem.permission)
  },
  methods: {
    async initialize() {
      this.roles = await axios.get("/roles").then((result) => {
        return result.data.map((item) => ({
          ...item,
          button: this.table.button,
          badge: {
            type: 'info',
            value: item.guard_name,
          }
        }))
      });
    },
    selectGuard(guard) {
      this.temp_permission = this.permissoes.filter(value => value.guard_name == guard)
    },
    selectItems() {
      //   this.selected;
      this.editedItem.permission = this.selected
        ? this.temp_permission.map(({ id }) => id)
        : []
      // console.log(this.editedItem.permission)
    },
    getPermissions() {
      axios.get("/roles/create").then((result) => {
        this.permissoes = result.data;
        this.selectGuard('web')
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

      this.editedItem.permission = await axios
        .get("/roles/" + item.id + "/edit")
        .then((result) => {
          return result.data.map((permission) => {
            return permission.permission_id;
          });
        });
      this.editedIndex = this.roles.indexOf(item);
      this.editedItem.name = item.name;
      this.editedItem.guard_name = item.guard_name;
      this.editedItem.id = item.id;
      this.$q.loading.hide()
      this.$refs.dialog.show()
    },
    editConfirm() {
      let formData = this.prepareForm(this.editedItem, 'patch')
      this.loading = true;
      axios
        .post("/roles/" + this.editedItem.id, formData, {})
        .then((response) => {
          // this.$auth.$reset();
          this.loading = false;
          this.close('dialog');
          this.$q.dialog({
            title: 'Success',
            message: '' + response.data.message,
          })
        })
        .catch((error) => {
          this.loading = false;
          this.close('dialog');
          this.$q.dialog({
            title: 'Error',
            message: '' + error.response.data.message,
          })
        });
    },
    createConfirm() {
      let formData = this.prepareForm(this.editedItem)
      this.loading = true;
      axios
        .post("/roles", formData, {})
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
      axios.get("/roles/" + item.id).then((result) => {

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
        this.editedIndex = this.roles.indexOf(item);
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
        .post("/roles/" + this.editedItem.id, formData, {})
        .then((response) => {
          this.$q.loading.hide()
          this.$q.dialog({
            title: 'Success',
            message: '' + response.data.message,
          })
          this.roles.splice(this.editedIndex, 1);
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
    prepareForm(form, method = 'POST') {
      const formData = new FormData();
      for (const key in form) {
        if (typeof form[key] === 'object') {
          for (let i = 0; i < form[key].length; i++) {
            // formData.append(`${key}[${i}]`, form[key][i]);
            if (typeof form[key][i] !== 'object') {
              formData.append(`${key}[${i}]`, form[key][i]);
            }
            for (const subKey in form[key][i]) {
              formData.append(`${key}[${i}][${subKey}]`, form[key][i][subKey]);
            }
          }
        } else {
          formData.append(key, form[key]);
        }
      }
      formData.append("_method", method);
      return formData
    },
    close(dialogRef) {
      this.$refs[dialogRef].hide();

      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    save() {
      if (this.editedIndex > -1) {
      
        this.editConfirm()
        Object.assign(this.roles[this.editedIndex], this.editedItem);
      } else {
        this.createConfirm()
      }
    }
  }
})
</script>