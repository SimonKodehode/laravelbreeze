<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import BlogCard from "@/Components/BlogCard.vue";
export default {
    //Components
    components: {
        AppLayout,
        BlogCard,
    },
};
</script>

<template>
    <AppLayout>
        <section class="blog">
            <div class="blog-container">
                <BlogCard></BlogCard>
            </div>
        </section>
    </AppLayout>
</template>
