# Comandos to Inertia setup
- composer create-project laravel/laravel --prefer-dist -vv
- composer require inertiajs/inertia-laravel
- npm install @inertiajs/inertia @inertiajs/inertia-vue3
- npm install vue@next
- npm install -D @vue/compiler-sfc
- php artisan inertia:middleware
- npm install
- npx mix => npm run dev
- npm run watch

# Webpack

```js
mix.js('resources/js/app.js', 'public/js')
.vue(3)
.postCss('resources/css/app.css', 'public/css', [
//
])
.version();
```

```js
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";

createInertiaApp({
    resolve: (name) => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
        .use(plugin)
        .mount(el);
    },
});
});
// require('./bootstrap'); // Padrão do Laravel
```
