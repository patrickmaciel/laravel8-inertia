<template>
  <Head>
    <title>My App - Users</title>
    <meta type='description' head-key='description' content='Description of Users page'>
  </Head>

  <h1 class='text-3xl'>Users</h1>

  <ul>
    <li v-for="user in users" :key="user.id" v-text="user.name" />
  </ul>

  <div style="margin-top: 800px">
    <p>The current time is {{ time }}</p>
    <Link href='/users' class='text-blue-500' preserve-scroll>Refresh</Link>
  </div>
</template>

<script setup>
defineProps({
  time: String,
  users: Array
});
</script>
