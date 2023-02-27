<script>
import Comment from "@/Components/Comment.vue";

export default {
    //States
    data() {
        return {
            active: true,
            comments: false,
        };
    },

    methods: {
        setActive() {
            this.active = !this.active;
        },
        toggleComments() {
            this.comments = !this.comments;
        },
    },

    props: {
        username: String,
        created: String,
        title: String,
        desc: String,
        likes: Number,
    },

    components: {
        Comment,
    },

    mounted() {
        console.log(this.comments);
    },
};
</script>

<template>
    <div class="blog-card">
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
                    <button class="blog-card-likes">
                        <FontAwesomeIcon
                            class="blog-card-like"
                            icon="fa-solid fa-thumbs-up"
                        ></FontAwesomeIcon>
                        <p class="blog-card-likes-number">{{ likes }}</p>
                    </button>
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
                    comments
                        ? 'blog-card-comments'
                        : 'blog-card-comments hidden'
                "
            >
                <form class="blog-card-form">
                    <textarea
                        id="comment"
                        placeholder="Your comment..."
                    ></textarea>
                    <div class="blog-card-comments-btn-wrap">
                        <button class="add">ADD</button>
                        <button class="cancel">CANCEL</button>
                    </div>
                </form>
                <div class="blog-card-comments-section">
                    <Comment></Comment>
                    <Comment></Comment>
                    <Comment></Comment>
                    <Comment></Comment>
                    <Comment></Comment>
                    <Comment></Comment>
                </div>
            </div>
        </div>
    </div>
</template>
