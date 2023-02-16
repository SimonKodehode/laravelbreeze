<script setup></script>

<template>
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
                    <div class="blog-likes">
                        <FontAwesomeIcon
                            class="blog-like"
                            icon="fa-solid fa-thumbs-up"
                        ></FontAwesomeIcon>
                        <p class="blog-likes-number">200</p>
                    </div>
                </header>
                <div class="blog-text-wrap">
                    <h1 class="blog-headline">
                        Why the last season of GOT sucked
                    </h1>
                    <p class="blog-p">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Alias eos quam deleniti quae tempora dolorem
                        veniam maiores, aut sequi eaque? Ullam delectus
                        explicabo vel laborum ab vitae maxime dolores sint.
                    </p>
                </div>
                <div class="blog-left-bottom">
                    <p class="blog-readmore">Readmore</p>
                </div>
            </div>
        </div>
    </section>
</template>
