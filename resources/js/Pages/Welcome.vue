<template>
    <Layout :username="username">
      <h1 class='text-3xl'>Hello, {{ name }}</h1>

      <p>Eu sou {{ idade <= 18 ? 'Novo' : 'Velho' }}</p>
      <p>In this series, we will use the following frameworks:</p>
      <ul>
          <li v-for="framework,key in frameworks" v-bind:key="key" v-text="framework"></li>
      </ul>
      <hr>
    </Layout>
</template>

<script>
import Layout from '../Shared/Layout';

export default {
    components: { Layout },
    props: {
        name: String,
        idade: Number,
        frameworks: Array,
        username: String
    },
};
</script>
