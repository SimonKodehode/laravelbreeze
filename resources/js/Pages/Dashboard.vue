<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import BlogCard from "@/Components/BlogCard.vue";

export default {
    components: {
        BlogCard,
        Link,
        Head,
        AppLayout,
    },

    methods: {
        deleteBlog(id) {
            if (confirm("Are you sure?")) {
                this.$inertia.delete(this.route(""));
            }
        },
    },
};
</script>

<template>
    <Head title="Dashboard" />
    <AppLayout>
        <section class="dashboard">
            <h1 class="dashboard-headline">
                Welcome {{ $page.props.auth.user.name }}!
            </h1>

            <div class="dashboard-blog">
                <header class="dashboard-blog-header">
                    <p class="dashboard-blog-id">POSTID</p>
                    <button class="dashboard-blog-delete">DELETE</button>
                </header>
                <BlogCard></BlogCard>
            </div>
        </section>
    </AppLayout>
</template>
