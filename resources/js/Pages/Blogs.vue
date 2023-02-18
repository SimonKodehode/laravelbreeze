<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    //States
    data() {
        return {
            active: false,
        };
    },
    //Methods
    methods: {
        setActive() {
            this.active = !this.active;
        },
    },
    //Components
    components: {
        AppLayout,
    },
};
</script>

<template>
    <AppLayout>
        <section class="blog">
            <div class="blog-container">
                <div class="blog-card">
                    <div class="blog-card-wrapper">
                        <header class="blog-header">
                            <div class="blog-user-wrap">
                                <FontAwesomeIcon
                                    class="blog-user_icon"
                                    icon="fa-solid fa-user-circle"
                                ></FontAwesomeIcon>

                                <h1 class="blog-user_name">Username</h1>
                            </div>
                            <p class="blog-created_at">March 20</p>
                        </header>
                        <div class="blog-text-wrap">
                            <h1 class="blog-headline">
                                Why the last season of GOT sucked
                            </h1>
                            <p :class="active ? 'blog-p show' : 'blog-p'">
                                Lorem ipsum dolor sit amet consectetur,
                                adipisicing elit. Alias eos quam deleniti quae
                                tempora dolorem veniam maiores, aut sequi eaque?
                                Ullam delectus explicabo vel laborum ab vitae
                                maxime dolores sint.
                            </p>
                        </div>
                        <footer class="blog-footer">
                            <div class="blog-action">
                                <button class="blog-likes">
                                    <FontAwesomeIcon
                                        class="blog-like"
                                        icon="fa-solid fa-thumbs-up"
                                    ></FontAwesomeIcon>
                                    <p class="blog-likes-number">200</p>
                                </button>
                                <button class="blog-comment">Comment</button>
                            </div>
                            <button class="blog-readmore" @click="setActive">
                                Readmore
                            </button>
                        </footer>
                    </div>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
