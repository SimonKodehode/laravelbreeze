import "./bootstrap";
import "../css/app.css";
import "../scss/app.scss";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
//Import fontawesome library
import { library } from "@fortawesome/fontawesome-svg-core";

//import user icon
import {
    faUser,
    faUserPen,
    faUserCircle,
    faThumbsUp,
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

//Add icons to library
library.add(faUser, faUserCircle, faThumbsUp);

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component("FontAwesomeIcon", FontAwesomeIcon)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
