<template>
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
      <iframe class='mb-6' width="100%" frameborder="no" scrolling="no" seamless src="https://player.simplecast.com/c3390bb3-bf07-4406-a8d1-5007f9948b3f?dark=false"></iframe>

      <slot />
    </div>
  </section>
</template>

<script>
import Nav from "./Nav";

export default {
  components: { Nav },
  computed: {
    username() {
      return this.$page.props.auth.user.username
    }
  }
}
</script>
