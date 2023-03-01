<script>
import Comment from "@/Components/Comment.vue";
import { useForm, Link, usePage } from "@inertiajs/vue3";
export default {
    //States
    data() {
        return {
            active: true,
            comment: false,
            setLikedUser: null,
            form: useForm({
                body: null,
            }),
            componentKey: 0,
        };
    },

    methods: {
        setActive() {
            this.active = !this.active;
        },
        toggleComments() {
            this.comment = !this.comment;
        },

        discard() {
            this.form.body = null;
        },
        reRender() {
            this.componentKey += 1;
        },
    },

    props: {
        username: String,
        created: String,
        title: String,
        desc: String,
        comments: Array,
        likes: Array,
        postId: Number,
        slug: String,
        blog: Object | Array,
        likeuser: Object,
    },

    components: {
        Comment,
        Link,
    },

    watch: {
        componentKey(newVal) {
            if (newVal) {
                location.reload();
            }
        },
    },

    mounted() {
        if (
            this.likeuser &&
            this.likeuser.user_id === usePage().props.auth.user.id
        ) {
            this.setLikedUser = this.likeuser;
        }
    },
};
</script>

<template>
    <div class="blog-card" :key="componentKey">
        <div class="blog-card-wrapper">
            <header class="blog-card-header">
                <div class="blog-card-user-wrap">
                    <FontAwesomeIcon
                        class="blog-card-user_icon"
                        icon="fa-solid fa-user-circle"
                    ></FontAwesomeIcon>

                    <h1 class="blog-card-user_name">{{ username }}</h1>
                </div>
                <p class="blog-card-created_at">{{ created }}</p>
            </header>
            <div class="blog-card-text-wrap">
                <h1 class="blog-card-headline">
                    {{ title }}
                </h1>
                <p :class="active ? 'blog-card-p show' : 'blog-card-p'">
                    {{ desc }}
                </p>
            </div>
            <footer class="blog-card-footer">
                <div class="blog-card-action">
                    <Link
                        @click="reRender"
                        v-if="!setLikedUser"
                        :href="route('posts.likes.store', blog)"
                        method="post"
                        as="button"
                        class="blog-card-likes"
                    >
                        <FontAwesomeIcon
                            class="blog-card-like"
                            icon="fa-solid fa-thumbs-up"
                        ></FontAwesomeIcon>
                        <p class="blog-card-likes-number">
                            {{ likes ? likes.length : null }}
                        </p>
                    </Link>
                    <Link
                        v-else
                        @click="reRender"
                        :href="route('posts.likes.destroy', blog)"
                        method="delete"
                        as="button"
                        class="blog-card-likes"
                    >
                        Unlike
                    </Link>
                    <button class="blog-card-comment" @click="toggleComments">
                        Comment
                    </button>
                    <div class="blog-card-comments">
                        <p class="blog-card-comments-username"></p>
                    </div>
                </div>
                <button class="blog-card-readmore" @click="setActive">
                    Minimize
                </button>
            </footer>
            <div
                :class="
                    comment ? 'blog-card-comments' : 'blog-card-comments hidden'
                "
            >
                <form
                    @submit.prevent="
                        ($event) => form.post(route('comments.store', postId))
                    "
                    class="blog-card-form"
                >
                    <textarea
                        id="comment"
                        placeholder="Your comment..."
                        v-model="form.body"
                    ></textarea>
                    <div class="blog-card-comments-btn-wrap">
                        <button class="add" type="submit">ADD</button>
                        <button class="cancel" type="button" @click="discard">
                            CANCEL
                        </button>
                    </div>
                </form>
                <div class="blog-card-comments-section">
                    <Comment
                        v-if="comments"
                        v-for="comment of comments"
                        :body="comment.body"
                        :created="comment.created_at"
                    ></Comment>
                </div>
            </div>
        </div>
    </div>
</template>
