<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <Head title="Dashboard" />
    <AppLayout>
        <div class="mt-20 flex justify-center">
            <h1>Welcome {{ $page.props.auth.user.name }}!</h1>
        </div>
    </AppLayout>
</template>
