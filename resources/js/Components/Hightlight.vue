<template>
  <pre><code ref='block'>{{ code }}</code></pre>
</template>

<script setup>
import { highlightElement } from '@/Services/SyntaxHighlighting';
import { onMounted, ref } from 'vue';
// import {ref} from 'vue';

defineProps({
  code: String,
});

let block = ref(null)
onMounted(() => {
  highlightElement(block.value);
});
</script>

<script>
// import { highlightElement } from '@/Services/SyntaxHighlighting';

// export default {
//   mounted() {
//     // highlightAll();
//     // highlight();
//     highlightElement(this.$refs.code);
//   },
// }
</script>

<style>
@import '/node_modules/highlight.js/styles/github-dark.css';
</style>
