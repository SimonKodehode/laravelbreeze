<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
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
        deleteBlog(id, e) {
            e.preventDefault();
            if (confirm("Are you sure?")) {
                this.$inertia.delete(this.route("posts.destroy", id));
            }
        },
    },

    props: ["posts"],

    mounted() {
        console.log(this.posts);
    },
};
</script>

<template>
    <Head title="Dashboard" />
    <AppLayout>
        <section class="dashboard">
            <h1
                :class="
                    posts.length === 0
                        ? 'dashboard-headline no-posts'
                        : 'dashboard-headline'
                "
            >
                Welcome {{ $page.props.auth.user.name }}!
            </h1>

            <div class="dashboard-blog" v-if="posts.length > 0">
                <Link :href="route('posts.create')" class="dashboard-new-blog"
                    >New post</Link
                >
                <div class="dashboard-blog-wrapper" v-for="post in posts">
                    <header class="dashboard-blog-header">
                        <p class="dashboard-blog-id">{{ post.id }}</p>
                        <form>
                            <button
                                class="dashboard-blog-delete"
                                @click="
                                    ($event) => deleteBlog(post.slug, $event)
                                "
                            >
                                DELETE
                            </button>
                        </form>
                    </header>
                    <BlogCard
                        :created="post.created_at"
                        :title="post.title"
                        :desc="post.body"
                        :likes="post.likes"
                        :postId="post.id"
                        :slug="post.slug"
                    ></BlogCard>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
