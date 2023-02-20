<script>
import { Link, Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    components: {
        AppLayout,
        Link,
        Head,
    },
};
</script>

<template>
    <Head title="Home" />
    <AppLayout>
        <div class="hero-container">
            <div class="hero-wrap">
                <h2 class="hero-header">Welcome to</h2>

                <h3 class="hero-subheader">Breeze</h3>
            </div>
            <div class="hero-links">
                <Link :href="route('blogs.new')" class="hero-link">SHARE</Link>
                <Link :href="route('blogs.index')" class="hero-link"
                    >EXPLORE</Link
                >
            </div>
        </div>
    </AppLayout>
</template>
