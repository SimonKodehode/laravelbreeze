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

    data() {
        return {
            data: this.posts.data || null,
        };
    },

    props: ["posts"],
};
</script>

<template>
    <Head title="Blogs" />
    <AppLayout>
        <section class="blog" v-if="data.length > 0">
            <div class="blog-container">
                <BlogCard
                    v-for="post in data"
                    :username="post.user.name"
                    :created="post.created_at"
                    :title="post.title"
                    :desc="post.description"
                    :likes="post.likes"
                ></BlogCard>
            </div>
        </section>
        <h1 class="blog-none" v-else>No posts yet</h1>

        <Link class="blog-new" :href="route('blogs.new')">New post</Link>
    </AppLayout>
</template>
