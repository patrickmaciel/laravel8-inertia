<template>
  <Head>
    <title>My App - Users</title>
    <meta name="description" head-key="description" content="Description of Users page" />
  </Head>

  <div>
    <h1>{{ user.id }} User {{ user.name }}</h1>
    <p>{{ user.email }}</p>
  </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";

let props = defineProps({
  user: Object,
  can: Object,
});

</script>
