<template>
    <Nav />

    <h1>Hello, {{ name }}</h1>
    <p>In this series, we will use the following frameworks:</p>
    <ul>
        <li v-for="framework,key in frameworks" v-bind:key="key" v-text=framework></li>
    </ul>
    <hr>
</template>

<script>
import Nav from '../Shared/Nav';

export default {
    components: { Nav },
    props: {
        name: String,
        frameworks: Array,
    }
};
</script>
