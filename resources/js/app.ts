import { createApp, h } from 'vue'
import { createInertiaApp, usePage } from '@inertiajs/vue3'
import { Quasar } from 'quasar'
import 'quasar/src/css/index.sass'
import '@quasar/extras/material-icons/material-icons.css'
import { userStore } from './Stores/userStore'
import { User } from './Lib/types'
import { createPinia } from 'pinia'

const pinia = createPinia();

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(pinia)
      .use(Quasar, {
        config: {
          // can add quasar config here
          dark: true
        },
        plugins: {
          // can add quasar plugins here
        }
      })
      .mount(el)
  },
})





