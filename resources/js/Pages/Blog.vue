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
        <BlogCard
            :username="post.user.name"
            :created="post.created_at"
            :title="post.title"
            :desc="post.body"
            :likes="post.likes"
            :blog="post"
        ></BlogCard>
    </AppLayout>
</template>
