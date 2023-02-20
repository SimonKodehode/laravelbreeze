<script>
export default {
    //States
    data() {
        return {
            active: true,
        };
    },

    methods: {
        setActive() {
            this.active = !this.active;
        },
    },

    props: {
        username: String,
        created: String,
        title: String,
        desc: String,
        likes: Number,
    },

    mounted() {},
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
                    <button class="blog-card-comment">Comment</button>
                </div>
                <button class="blog-card-readmore" @click="setActive">
                    Minimize
                </button>
            </footer>
        </div>
    </div>
</template>
