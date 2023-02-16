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
            <div class="blog-card">
                <div class="blog-card-left">
                    <header class="blog-header">
                        <div class="blog-user-wrap">
                            <FontAwesomeIcon
                                class="blog-user_icon"
                                icon="fa-solid fa-user-circle"
                            ></FontAwesomeIcon>
                            <div class="blog-user-profile">
                                <h1 class="blog-user_name">Username</h1>
                                <p class="blog-created_at">March 20</p>
                            </div>
                        </div>
                        <button class="blog-likes">
                            <FontAwesomeIcon
                                class="blog-like"
                                icon="fa-solid fa-thumbs-up"
                            ></FontAwesomeIcon>
                            <p class="blog-likes-number">200</p>
                        </button>
                    </header>
                    <div class="blog-text-wrap">
                        <h1 class="blog-headline">
                            Why the last season of GOT sucked
                        </h1>
                        <p :class="active ? 'blog-p show' : 'blog-p'">
                            Lorem ipsum dolor sit amet consectetur, adipisicing
                            elit. Alias eos quam deleniti quae tempora dolorem
                            veniam maiores, aut sequi eaque? Ullam delectus
                            explicabo vel laborum ab vitae maxime dolores sint.
                        </p>
                    </div>
                    <div class="blog-left-bottom">
                        <button class="blog-readmore" @click="setActive">
                            Readmore
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
