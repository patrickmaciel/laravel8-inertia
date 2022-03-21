<template>
  <div v-if="hasError" v-text="hasError" class="text-red-500 text-xs"></div>
</template>

<script setup>
defineProps({
  hasError: String,
});
</script>
