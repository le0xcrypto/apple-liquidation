<template>
    <layout title="Welcome">
        <h1>Welcome World!</h1>
        <p>Hello {{ user.name }}, welcome to your Inertia app!</p>
    </layout>
</template>

<script>
    import Layout from '../Layout';

    export default {
        components: {
            Layout
        },
        props: {
            user: Object
        }
    };
</script>
