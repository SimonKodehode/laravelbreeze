<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import BlogCard from "@/Components/BlogCard.vue";
export default {
    components: {
        AppLayout,
        BlogCard,
    },

    props: ["post"],

    mounted() {
        console.log(this.post);
    },
};
</script>

<template>
    <AppLayout>
        <BlogCard></BlogCard>
    </AppLayout>
</template>
