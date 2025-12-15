import './bootstrap';
import '../css/app.css';
import $ from 'jquery';
window.$ = window.jQuery = $;
import 'datatables.net';
import 'datatables.net-dt';

$.extend(true, $.fn.dataTable.defaults, {
    // Definimos un DOM muy limpio y plano (l: length, f: filter, t: table, i: info, p: pagination)
    // Esto evita que Datatables use divs con clases conflictivas de su tema.
    dom: '<"top"lf>rt<"bottom"ip><"clear">', 
    
    // Opcional: Esto ayuda en ciertos casos de conflicto
    renderer: 'bootstrap' // Aunque usemos Tailwind, a veces esto ayuda a neutralizar el DT-theme
});

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
