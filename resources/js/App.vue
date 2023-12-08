<template>
    <q-layout view="hHh lpR fFf" >
      <q-header :class="$q.dark.isActive ? 'text-white' : ' text-grey-8 bg-white'"  :style="$q.dark.isActive ? 'background: #24292e':''" class="shadow-1  "  >
           
          <!-- <q-layout view="hHh lpR fFf" class="bg-grey-1"> -->
      <!-- <q-header class="bg-white text-grey-8"> -->
  
  
        <q-toolbar class="GNL__toolbar">
  
          <q-btn
            flat
            dense
            round
            @click="$q.screen.gt.sm?toogleMiniState():toggleLeftDrawer()"
            aria-label="Menu"
            icon="menu"
            class="q-mr-sm"
          />
  
          <q-toolbar-title v-if="$q.screen.gt.xs" shrink class="row items-center no-wrap">
            <!--          <img src="https://cdn.quasar.dev/img/layout-gallery/logo-google.svg">-->
            Tsenane 
          </q-toolbar-title>
  
          <q-space/>
  
          <q-input class="GNL__toolbar-input text-white" outlined dense v-model="search" color="text-white shadow-0"
                   placeholder="Search for topics, locations & sources">
            <template v-slot:prepend>
              <q-icon v-if="search === ''" name="search"/>
              <q-icon v-else name="clear" class="cursor-pointer" @click="search = ''"/>
            </template>
            <template v-slot:append>
              <q-btn
                flat
                dense
                round
                aria-label="Menu"
                icon="arrow_drop_down"
              >
              </q-btn>
            </template>
          </q-input>
  
          <q-space/>
  
          <div class="q-gutter-sm row items-center no-wrap">
            <q-btn v-if="$q.screen.gt.sm" round dense flat color="text-grey-7" icon="apps">
              <q-tooltip>Google Apps</q-tooltip>
            </q-btn>
            <q-btn round dense flat :color="messages.length==0? 'grey-8':'white'" icon="notifications">
              <q-badge color="red" text-color="white" floating>
               {{ messages.length }}
              </q-badge>
              <q-tooltip>Notifications</q-tooltip>
              <q-menu
              >
                <q-list style="min-width: 100px">
                  <notifications :messages="messages"></notifications>
                  <q-card class="text-center no-shadow no-border" v-if=" messages.length>=5">
                    <q-btn label="View All" style="max-width: 120px !important;" flat dense
                           class="text-indigo-8"></q-btn>
                  </q-card>
                </q-list>
              </q-menu>
            </q-btn>
  
            <q-btn round flat @click="toggleRightDrawer">
              <q-avatar size="26px">
                <img :src="   user.avatar
                            ? user.avatar
                            :`/images/default-avatar.png`">
              </q-avatar>
              <q-tooltip>Account</q-tooltip>
            </q-btn>
          </div>
        </q-toolbar>
      </q-header>
  
      <q-drawer v-model="leftDrawerOpen" 
        bordered  
        :mini="miniState"  
        :class="$q.dark.isActive ? 'text-white' : ' text-grey-8 bg-white'" 
        :style="$q.dark.isActive ? 'background: #24292e':''"
        :width="210"
      >
        <q-scroll-area class="fit">
          <q-list padding >
            <q-item>
              <q-btn :rounded="!miniState" :round="miniState" icon="add" color="white"   :class="$q.dark.isActive ? 'text-grey-8' : ' text-grey-8 '"  
                     :label="miniState?'':'Nova venda'"></q-btn>
            </q-item>
            <div v-for="item in items" :key="item.name">
              <q-separator inset class="q-my-sm" v-if="item.name=='Admin'"/>
              <q-item  v-ripple  v-if=" item.childrens == undefined" clickable>
              <q-item-section avatar>
                <q-icon :name="item.icon"   :class="item.color" />
              </q-item-section>
              <q-item-section>
                <q-item-label>{{ item.name }}</q-item-label>
              </q-item-section>
            </q-item>
  
              <q-expansion-item
              :icon="item.icon"
              :label="item.name"
              :header-class="item.color"
              v-if="item.childrens"
              >
            <q-list class="q-pl-lg"    v-for="children in item.childrens" :key="children.name" >
              <q-item to="/Map" active-class="q-item-no-link-highlighting"  v-ripple >
                <q-item-section avatar>
                  <q-icon :name="children.icon" :class="children.color" />
                </q-item-section>
                <q-item-section>
                  <q-item-label>{{ children.name }}</q-item-label>
                </q-item-section>
              </q-item>
            </q-list>
          </q-expansion-item>
            </div>
          </q-list>
        </q-scroll-area>
      </q-drawer>
      <right-bar v-model:rightDrawerOpen="rightDrawerOpen" v-model:user="user"></right-bar>
      <q-page-container class="bg-white "  >
     <slot />
      </q-page-container >
  
      <!-- <q-page-sticky style="background: #24292e" v-if="$q.screen.lt.sm" position="bottom-right" :offset="[10,10]" class="text-white bg-black" >
        <q-btn round
               icon="add"
               direction="up"
               color="accent"
        >
        </q-btn>
      </q-page-sticky> -->
  
      
    </q-layout>
  </template>
  
  <script>
  import {fasGlobeAmericas, fasFlask} from '@quasar/extras/fontawesome-v5'
  
  import menuList from "@/services/menu.js";
  import {defineComponent} from 'vue'
  import {ref} from 'vue'
  import rightBar from './components/layout/rightBar.vue'
  
  import {Dark,useDialogPluginComponent } from "quasar";
  import Notifications from './components/layout/notifications.vue';
  
  
  export default defineComponent({
    name: 'App',
    components: {
      rightBar,
      Notifications
    },
    data () {
      return {
        messages: [
            // {
            //   id: 5,
            //   name: 'Pratik Patel',
            //   msg: ' -- I\'ll be in your neighborhood doing errands this\n' +
            //     '            weekend. Do you want to grab brunch?',
            //   avatar: 'https://avatars2.githubusercontent.com/u/34883558?s=400&v=4',
            //   time: '10:42 PM'
            // },
          ],
        user: {
        
        },
        search:"",
          rightDrawerOpen: false,
          leftDrawerOpen:true,
          darkMode:false,
          miniState:false,  
          items:[],  
      }
    },
    mounted() {
      this.user = window.User;
      this.items = menuList
      this.darkMode = localStorage.getItem("laraquasar@theme")
        ? localStorage.getItem("laraquasar@theme") == "dark"
        : false;
      this.toggleDark(this.darkMode)
  
    },
  
    methods: {
     
      async logout(){
          console.log("log")
          // window.location.href ="/login"
         
          document.querySelector("#logout").submit();
      }, 
    
      toggleDark(darkMode){
          // console.log(darkMode)
          this.darkMode = darkMode
          localStorage.setItem("laraquasar@theme", darkMode ? "dark" : "light");
          Dark.set(darkMode)
  
      },
      toggleRightDrawer () {
          this.rightDrawerOpen = !this.rightDrawerOpen
        },
        toggleLeftDrawer() {
          this.leftDrawerOpen = !this.leftDrawerOpen
        },
        toogleMiniState() {
          this.miniState = !this.miniState
        },
    }
  
  
  })
  </script>
  
  <style>
  .GNL__toolbar {
    height: 64px;
  }
  
  .GNL__toolbar-input {
    width: 55%;
  }
  
  .GNL__drawer-item {
    line-height: 24px;
    border-radius: 0 24px 24px 0;
    margin-right: 12px;
  }
  
  .GNL__drawer-item .q-item__section--avatar .q-icon {
    color: #5f6368;
  }
  
  .GNL__drawer-item .q-item__label {
    color: #3c4043;
    letter-spacing: .01785714em;
    font-size: .875rem;
    font-weight: 500;
    line-height: 1.25rem;
  }
  
  .GNL__drawer-footer-link {
    color: inherit;
    text-decoration: none;
    font-weight: 500;
    font-size: .75rem;
  }
  
  .GNL__drawer-footer-link:hover {
    color: #000;
  }
  </style>
  