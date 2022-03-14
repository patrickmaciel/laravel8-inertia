<template>
  <nav class='mb-4'>
    <ul class='flex gap-2'>
      <li><Link class='text-blue-500 hover:underline' href="/">Home</Link></li>
      <li><Link class='text-blue-500 hover:underline' href="/users">Users</Link></li>
      <li><Link class='text-blue-500 hover:underline' href="/settings">Settings</Link></li>
      <li><Link class='text-blue-500 hover:underline' href="/logout" method='post' :data="{ foo: 'bar'}" as='button'>Log Out</Link></li>
    </ul>
  </nav>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: { Link }
};
</script>

<style>
</style>
