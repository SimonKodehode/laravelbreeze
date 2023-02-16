<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
};
</script>

<template>
    <header class="header">
        <Link :href="route('home')" class="header-text">BREEZE</Link>
        <ul class="header-links">
            <li class="header-link">
                <Link :href="route('login')">LOGIN</Link>
            </li>
            <li class="header-link">
                <Link :href="route('register')">REGISTER</Link>
            </li>
        </ul>
    </header>
    <slot />
</template>
