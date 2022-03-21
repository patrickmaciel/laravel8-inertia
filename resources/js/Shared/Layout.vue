<template>
  <Head>
    <title>Welcome</title>
    <meta type='description' head-key='description' content='Welcome to the Inertia.js'>
  </Head>

  <section class='p-6 bg-gray-200'>
    <header class='flex justify-between'>
      <div class='flex items-center'>
        <h1 class='font-bold text-lg'>My App</h1>
        <!-- <p class='ml-4 text-sm'>Welcome Back, {{ $page.props.auth.user.username }}</p> -->
        <p class='ml-4 text-sm'>Welcome Back, {{ username }}</p>
      </div>
      <Nav />
    </header>
  </section>

  <section class="p-6">
    <div class="max-w-3xl mx-auto">
      <slot />
    </div>
  </section>
</template>

<script>
import Nav from "./Nav";
import { Head } from "@inertiajs/inertia-vue3";

export default {
  components: { Nav },
  computed: {
    username() {
      return this.$page.props.auth.user.username
    }
  }
}
</script>
