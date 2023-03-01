<script>
export default {
    props: {
        created: String,
        title: String,
        desc: String,
        postId: Number,
        slug: String,
        blog: Object | Array,
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

                    <h1 class="blog-card-user_name">
                        {{ $page.props.auth.user.name }}
                    </h1>
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
        </div>
    </div>
</template>
