<template>
  <Head>
    <title>My App - Users</title>
    <meta name="description" head-key="description" content="Description of Users page" />
  </Head>

  <!-- This example requires Tailwind CSS v2.0+ -->
  <div>

</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";

let props = defineProps({
  user: Object,
  can: Object,
});
</script>
