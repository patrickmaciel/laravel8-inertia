<template>
  <nav>
    <ul class='flex space-x-6 gap-2'>
      <li><NavLink href='/' :class="{ 'font-bold underline' : $page.component == 'Welcome' }">Home</NavLink></li>
      <li><NavLink href='/users' :class="{ 'font-bold underline' : $page.component == 'Users' }">Users</NavLink></li>
      <li><NavLink href='/settings' :class="{ 'font-bold underline' : $page.component == 'Settings' }">Settings</NavLink></li>
      <li><NavLink href='/logout' :class="{ 'font-bold underline' : $page.url == '/logout' }" method='post' data="{ foo: 'bar' }" as='button'>Log Out</NavLink></li>
      <!-- <li><Link class='text-blue-500 hover:underline' :class="{ 'font-bold underline': $page.url.startsWith('/users') }" href="/users">Users</Link></li>
      <li><Link class='text-blue-500 hover:underline' :class="{ 'font-bold underline': $page.component == 'Settings' }" href="/settings">Settings</Link></li>
      <li><Link class='text-blue-500 hover:underline' :class="{ 'font-bold underline': $page.url == '/logout' }" href="/logout" method='post' :data="{ foo: 'bar'}" as='button'>Log Out</Link></li> -->
    </ul>
  </nav>
</template>

<script>
import NavLink from "./NavLink";

export default {
  components: { NavLink }
};
</script>
