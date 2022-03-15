<template>
  <Nav />

  <h1>Users</h1>
  <div style="margin-top: 800px">
    <p>The current time is {{ time }}</p>
    <Link href='/users' class='text-blue-500' preserve-scroll>Refresh</Link>
  </div>
</template>

<script>
import Nav from "../Shared/Nav.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: { Nav, Link},
  props: {
      time: String,
  }
};
</script>
