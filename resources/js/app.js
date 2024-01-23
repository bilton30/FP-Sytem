// require('./bootstrap');
import "../css/app.css";
import * as bootstrap from "bootstrap";
// import App from './App.vue'
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";

import i18n from "./plugins/i18n/i18n.js";
// import directive from './services/directive.js'
import { can, canany } from "./services/directive.js";
import { Quasar, Dialog, Notify, LoadingBar, Loading } from "quasar";
// Import icon libraries
import "@quasar/extras/material-icons/material-icons.css";
import "@quasar/extras/fontawesome-v6/fontawesome-v6.css";

// Import Quasar css
import "quasar/src/css/index.sass";
// import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./pages/**/*.vue", { eager: true });
        return pages[`./pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(i18n)
            .use(plugin)

            .use(Quasar, {
                config: {
                    dark: "auto",
                },
                plugins: {
                    Dialog,
                    Notify,
                    Loading,
                    LoadingBar,
                },
            })
            .directive("can", can)
            .directive("canany", canany)
            .mount(el);
    },
});
