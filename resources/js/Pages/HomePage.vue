<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <header class="header">
        <h1 class="header-text">BREEZE</h1>
        <ul class="header-links">
            <li class="header-link">
                <Link :href="route('login')">LOGIN</Link>
            </li>
            <li class="header-link">
                <Link :href="route('register')">REGISTER</Link>
            </li>
        </ul>
    </header>
    <main class="hero">
        <h2 class="hero-header">Welcome to</h2>
        <h3 class="hero-subheader">Breeze</h3>
        <div class="hero-links">
            <Link class="hero-link">Share</Link>
            <Link class="hero-link">Explore</Link>
        </div>
    </main>
</template>
