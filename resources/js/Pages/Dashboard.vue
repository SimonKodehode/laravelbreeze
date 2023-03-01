<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import BlogCardPersonal from "@/Components/BlogCardPersonal.vue";

export default {
    data() {
        return {
            isEdit: false,
            setEditSlug: null,
            form: useForm({
                title: null,
                body: null,
            }),
        };
    },
    components: {
        BlogCardPersonal,

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

        setIsEdit(slug) {
            this.isEdit = !this.isEdit;

            this.posts.map((post) => {
                if (post.slug === slug) {
                    this.setEditSlug = slug;
                }
            });
        },

        discard() {
            this.isEdit = !this.isEdit;
            this.form.title = null;
            this.form.body = null;
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
                        <form>
                            <button
                                class="dashboard-blog-delete"
                                type="button"
                                @click="($event) => setIsEdit(post.slug)"
                            >
                                EDIT
                            </button>
                        </form>
                    </header>
                    <div v-if="isEdit && setEditSlug === post.slug">
                        <BlogCardPersonal
                            :created="post.created_at"
                            :title="post.title"
                            :desc="post.body"
                            :postId="post.id"
                            :slug="post.slug"
                            :blog="post"
                        >
                        </BlogCardPersonal>
                        <form
                            @submit.prevent="
                                ($event) =>
                                    form.put(route('posts.update', post.slug))
                            "
                            method="put"
                        >
                            <label for="title">Title</label>
                            <input
                                type="text"
                                id="title"
                                v-model="form.title"
                            />
                            <label for="body">Body</label>
                            <input type="text" id="body" v-model="form.body" />
                            <button type="submit">UPDATE</button>
                            <button type="button" @click="discard">
                                DISCARD
                            </button>
                        </form>
                    </div>
                    <BlogCardPersonal
                        v-else
                        :created="post.created_at"
                        :title="post.title"
                        :desc="post.body"
                        :postId="post.id"
                        :slug="post.slug"
                        :blog="post"
                    >
                    </BlogCardPersonal>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
