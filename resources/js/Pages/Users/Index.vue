<template>
  <Head>
    <title>My App - Users</title>
    <meta name="description" head-key="description" content="Description of Users page" />
  </Head>

  <!-- This example requires Tailwind CSS v2.0+ -->
  <div>
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Users</h1>
        <p class="mt-2 text-sm text-gray-700">
          A list of all the users in your account including their name, title,
          email and role.
        </p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <Link v-if="can.createUser" href="/users/create" as="button"
          class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto" >
          Add user
        </Link>
      </div>
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <input
            v-model="search"
            type="text"
            placeholder="Search..."
            class="border px-2 rounded-lg my-2 w-full"
          />
          <div
            class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg"
          >
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    scope="col"
                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                  >
                    Name
                  </th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr v-for="user in users.data" :key="user.id">
                  <td
                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"
                  >
                    {{ user.name }}
                  </td>
                  <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6" >
                    <Link v-if="user.can.edit"
                      :href="`/users/${user.id}/edit`"
                      class="text-indigo-600 hover:text-indigo-900"
                      >Edit<span class="sr-only">, {{ user.name }}</span></Link
                    >
                  </td>
                </tr>

                <!-- More people... -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div>
    <!-- option 1 -->
    <!-- <Link v-for='link in users.links' :href='link.url' v-html='link.label' /> -->

    <!-- option 2 -->
    <!-- <template v-for='link in users.links'>
      <Link v-if="link.url" :href='link.url' v-html='link.label' />
      <span v-else v-html="link.label"></span>
    </template> -->

    <!-- option 3  -->
    <div class="mt-6">
      <!-- <Component
        :is="link.url ? 'Link' : 'span'"
        v-for='link,index in users.links'
        :key='index'
        :href='link.url'
        v-html='link.label'
        class='px-1'
        :class="link.url ? '' : 'text-gray-500'"
      /> -->
    </div>

    <Pagination :links="users.links" class="mt-6" />
  </div>

  <div style="margin-top: 800px">
    <p>The current time is {{ time }}</p>
    <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
  </div>
</template>

<script setup>
import Pagination from "@/Shared/Pagination.vue";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import throttle from "lodash/throttle";
import debounce from "lodash/debounce";

let props = defineProps({
  time: String,
  users: Object,
  filters: Object,
  can: Object,
});

let search = ref(props.filters.search);

watch(
  search,
  debounce(function (value) {
    console.log("debounce");
    Inertia.get(
      "/users",
      {
        search: value,
      },
      {
        preserveState: true, // não gera histórico
        replace: true, // não recarrega a página
      }
    );
  }, 500)
);
// watch(
//   search,
//   throttle(function (value) {
//     console.log("throttle");
//     Inertia.get(
//       "/users",
//       {
//         search: value,
//       },
//       {
//         preserveState: true, // não gera histórico
//         replace: true, // não recarrega a página
//       }
//     );
//   }, 500)
// );
</script>
