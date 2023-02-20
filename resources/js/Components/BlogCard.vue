<script>
export default {
    //States
    data() {
        return {
            active: false,
        };
    },

    methods: {
        setActive() {
            this.active = !this.active;
        },
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

                    <h1 class="blog-card-user_name">Username</h1>
                </div>
                <p class="blog-card-created_at">March 20</p>
            </header>
            <div class="blog-card-text-wrap">
                <h1 class="blog-card-headline">
                    Why the last season of GOT sucked
                </h1>
                <p :class="active ? 'blog-card-p show' : 'blog-card-p'">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Alias eos quam deleniti quae tempora dolorem veniam maiores,
                    aut sequi eaque? Ullam delectus explicabo vel laborum ab
                    vitae maxime dolores sint.
                </p>
            </div>
            <footer class="blog-card-footer">
                <div class="blog-card-action">
                    <button class="blog-card-likes">
                        <FontAwesomeIcon
                            class="blog-card-like"
                            icon="fa-solid fa-thumbs-up"
                        ></FontAwesomeIcon>
                        <p class="blog-card-likes-number">200</p>
                    </button>
                    <button class="blog-card-comment">Comment</button>
                </div>
                <button class="blog-card-readmore" @click="setActive">
                    Read more
                </button>
            </footer>
        </div>
    </div>
</template>
