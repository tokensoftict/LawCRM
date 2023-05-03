<template>
    <app-main></app-main>

    <notifications position="top right" />
</template>

<script>

    import main from "./layout/main/main.vue";

export default {
    name: 'App',
    components: {
        'app-main' : main
    },
}
</script>

<style>

</style>
