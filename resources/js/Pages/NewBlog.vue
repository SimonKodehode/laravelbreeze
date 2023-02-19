<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm, Link, Head } from "@inertiajs/vue3";
export default {
    data() {
        return {
            form: useForm({
                title: null,
                body: null,
            }),
        };
    },
    components: {
        AppLayout,
        Link,
    },
};
</script>

<template>
    <AppLayout>
        <section class="new-blog">
            <h1 class="new-blog-headline">NEW BLOGPOST</h1>
            <p class="new-blog-subheader">WHATS ON YOUR MIND?</p>

            <form
                @submit.prevent="($event) => form.post(route(''))"
                class="new-blog-form"
            >
                <label for="title">TITLE</label>
                <input type="text" id="title" v-model="form.title" />
                <label for="body">BODY</label>
                <textarea id="body" v-model="form.body"></textarea>
                <div class="new-blog-action">
                    <button type="submit" class="new-blog-create">
                        CREATE
                    </button>
                    <Link :href="route('blogs')" class="new-blog-discard"
                        >DISCARD</Link
                    >
                </div>
            </form>
        </section>
    </AppLayout>
</template>
