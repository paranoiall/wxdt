<template>
    <div>
        <h1>Hello, Larvue!</h1>
        <p class="hello">{{ msg }}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                msg: 'Hello!'
            }
        }
    }
</script>

<style scoped>
    .hello {
        font-size: 2em;
        color: green;
    }
</style>
