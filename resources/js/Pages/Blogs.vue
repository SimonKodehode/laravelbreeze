<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import BlogCard from "@/Components/BlogCard.vue";
export default {
    //Components
    components: {
        AppLayout,
        BlogCard,
    },

    data() {
        return {
            data: this.posts.data,
        };
    },

    props: ["posts"],

    mounted() {
        console.log(this.data);
    },
};
</script>

<template>
    <AppLayout>
        <section class="blog">
            <div class="blog-container">
                <div v-for="post in data">
                    <BlogCard
                        :username="post.user.name"
                        :created="post.created_at"
                        :title="post.title"
                        :desc="post.description"
                        :likes="post.likes"
                    ></BlogCard>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
