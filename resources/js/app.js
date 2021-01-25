require('./bootstrap');

import { createApp, h } from "vue";
import { App, plugin} from "@inertiajs/inertia-vue3"

import { InertiaProgress } from "@inertiajs/progress"

InertiaProgress.init({
    delay: 250,
    color: '#6366F1',
    includeCSS: true,
    showSpinner: false
})

const el = document.getElementById('app')

import Layout from './Layouts/Master'

const vueApp = createApp({
    render: () => h(App, {
        initialPage: JSON.parse(el.dataset.page),
        resolveComponent: name => import(`./Pages/${name}`)
            .then(({ default: page }) => {
                page.layout = page.layout === undefined ? Layout : page.layout
                return page
            })
    })
})
vueApp.mixin({
    methods: {
        $route: (...args) => window.route(...args),
        $isCurrent: (...args) => window.route().current(...args)
    }
})
vueApp.use(plugin).mount(el)