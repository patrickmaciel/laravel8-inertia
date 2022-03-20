import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from '@inertiajs/progress';
import Layout from "./Shared/Layout.vue";

createInertiaApp({
  resolve: (name) => {
      let page = require(`./Pages/${name}`).default;
    //   if (!page.layout) {
    //       page.layout = Layout;
    //   }
      page.layout ??= Layout;
      return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el);
  },
});

InertiaProgress.init({
    color: 'red',
    showSpinner: true
});

// require('./bootstrap'); // Padrão do Laravel
