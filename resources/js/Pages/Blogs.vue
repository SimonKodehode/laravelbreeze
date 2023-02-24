<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import BlogCard from "@/Components/BlogCard.vue";
import { Link, Head } from "@inertiajs/vue3";
export default {
    //Components
    components: {
        AppLayout,
        BlogCard,
        Head,
        Link,
    },

    props: ["posts"],

    mounted() {
        console.log(this.posts);
    },
};
</script>

<template>
    <Head title="Blogs" />
    <AppLayout>
        <section class="blog" v-if="posts.length > 0">
            <div class="blog-container">
                <div class="blog-new-wrap">
                    <Link class="blog-new" :href="route('posts.create')"
                        >New post</Link
                    >
                </div>
                <BlogCard
                    v-for="post in posts"
                    :created="post.created_at"
                    :title="post.title"
                    :desc="post.body"
                ></BlogCard>
            </div>
        </section>
        <div class="blog-none" v-else>
            <h1 class="blog-none-text">No posts yet</h1>
            <Link class="blog-new" :href="route('posts.create')">New post</Link>
        </div>
    </AppLayout>
</template>
