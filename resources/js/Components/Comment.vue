<script>
export default {
    props: {
        username: String,
        created: String,
        content: String,
    },
};
</script>

<template>
    <div class="blog-comment">
        <header class="blog-comment-header">
            <div class="blog-comment-profile">
                <FontAwesomeIcon
                    class="blog-comment-user_icon"
                    icon="fa-solid fa-user-circle"
                ></FontAwesomeIcon>
                <h1 class="blog-comment-username">Username</h1>
            </div>
            <p class="blog-comment-date">March 20</p>
        </header>
        <p class="blog-comment-p">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo,
            possimus?
        </p>
    </div>
</template>
