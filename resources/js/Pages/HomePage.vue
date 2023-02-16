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
        <main class="hero">
            <h2 class="hero-header">Welcome to</h2>
            <h3 class="hero-subheader">Breeze</h3>
            <div class="hero-links">
                <Link class="hero-link">Share</Link>
                <Link :href="route('blogs')" class="hero-link">Explore</Link>
            </div>
        </main>
    </AppLayout>
</template>
