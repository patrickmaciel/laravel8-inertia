<template>
  <Head title="Create User" />

  <h1 class="text-3xl">Create New User</h1>

  <form @submit.prevent="submit" class="max-w-md mx-auto mt-7">
    <div class="mb-6">
      <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="name"
      >
        Name
      </label>
      <input
        v-model="form.name"
        name="name"
        id="name"
        class="border border-gray-400 p-2 w-full"
        type="text"
      />
      <ValidationError :hasError="errors.name" />
      <!-- <div
        v-if="errors.name"
        v-text="errors.name"
        class="text-red-500 text-xs"
      ></div> -->
    </div>

    <div class="mb-6">
      <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="email"
      >
        E-mail
      </label>
      <input
        v-model="form.email"
        name="email"
        id="email"
        class="border border-gray-400 p-2 w-full"
        type="email"
      />
      <ValidationError :hasError="errors.email" />
    </div>

    <div class="mb-6">
      <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="password"
      >
        Password
      </label>
      <input
        v-model="form.password"
        type="password"
        name="password"
        id="password"
        class="border border-gray-400 p-2 w-full"
      />
      <ValidationError :hasError="errors.password" />
    </div>

    <div class="mb-6">
      <button
        type="submit"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      >
        Submit
      </button>
    </div>
  </form>
</template>

<script setup>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import ValidationError from "../../Shared/ValidationError";

// errors = defineProps errors
defineProps({
  errors: Object,
});

let form = reactive({
  name: "",
  email: "",
  password: "",
});

let submit = () => {
  Inertia.post("/users", form);
};
</script>
