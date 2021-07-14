<template>
    <main>
        <header class="bg-red-300 mb-3">
            <inertia-link href="/">Home / </inertia-link>
            <inertia-link href="/hello-world">Hello World</inertia-link>
        </header>
        <article>
            <slot />
        </article>
    </main>
</template>

<script>
    export default {
        props: {
            title: String
        },
        watch: {
            title: {
                immediate: true,
                handler(title) {
                    document.title = title;
                }
            }
        }
    };
</script>
