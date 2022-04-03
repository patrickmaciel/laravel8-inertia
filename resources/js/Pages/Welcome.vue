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
  <div>
    <pre>
      <code ref="ex1">
        class Example
        {
          public function __construct()
          {
            //
          }
        }
      </code>
    </pre>
  </div>

  <hr />
  <div id="ex2">
    <pre>
      <code>
        class Example
        {
          public function __construct()
          {
            //
          }
        }
      </code>
    </pre>
  </div>
</template>

<script setup>
defineProps({
  name: String,
  idade: Number,
  frameworks: Array,
});
</script>

<script>
import { highlight, highlightElement } from '@/Services/SyntaxHighlighting';

export default {
  mounted() {
    // highlightAll();
    // highlight();
    highlightElement(this.$refs.ex1);
  },
}
</script>

<style>
@import '/node_modules/highlight.js/styles/github-dark.css';
</style>
