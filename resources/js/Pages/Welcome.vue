<template>
  <Head>
    <title>Home</title>
    <meta
      type="description"
      head-key="description"
      content="Description of Welcome page"
    />
  </Head>
  <!-- <Head title='My App - Home' /> -->

  <h1 class="text-3xl">Hello, {{ name }}</h1>

  <p>Eu sou {{ idade <= 18 ? "Novo" : "Velho" }}</p>
  <p>In this series, we will use the following frameworks:</p>
  <ul>
    <li
      v-for="(framework, key) in frameworks"
      v-bind:key="key"
      v-text="framework"
    ></li>
  </ul>

  <hr />

  <hightlight :code='snippet' />
</template>

<script setup>
import Hightlight from "../Components/Hightlight.vue";

defineProps({
  name: String,
  idade: Number,
  frameworks: Array,
});

let snippet = `
class Example
{
  public function __construct()
  {
    // ...
  }
}
`.trim();
</script>
