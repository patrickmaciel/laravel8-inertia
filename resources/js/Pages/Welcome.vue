<template>
  <Head>
    <title>Home</title>
    <meta type='description' head-key='description' content='Description of Welcome page'>
  </Head>
  <!-- <Head title='My App - Home' /> -->

  <h1 class='text-3xl'>Hello, {{ name }}</h1>

  <p>Eu sou {{ idade <= 18 ? 'Novo' : 'Velho' }}</p>
  <p>In this series, we will use the following frameworks:</p>
  <ul>
      <li v-for="framework,key in frameworks" v-bind:key="key" v-text="framework"></li>
  </ul>
  <hr>
</template>

<script setup>
defineProps({
  name: String,
        idade: Number,
        frameworks: Array,
});
</script>
