<script>
import { Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    components: {
        AppLayout,
        Link,
    },
};
</script>

<template>
    <AppLayout>
        <div class="hero-container">
            <div class="hero-wrap">
                <h2 class="hero-header">Welcome to</h2>

                <h3 class="hero-subheader">Breeze</h3>
            </div>
            <div class="hero-links">
                <Link class="hero-link">SHARE</Link>
                <Link :href="route('blogs')" class="hero-link">EXPLORE</Link>
            </div>
        </div>
    </AppLayout>
</template>
