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
      <ValidationError :hasError="form.errors.name" />
      <!-- <div
        v-if="form.errors.name"
        v-text="form.errors.name"
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
      <ValidationError :hasError="form.errors.email" />
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
      <ValidationError :hasError="form.errors.password" />
    </div>

    <div class="mb-6">
      <button
        type="submit"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        :disabled="form.processing"
      >
        Submit
      </button>
    </div>
  </form>
</template>

<script setup>
import { reactive, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import ValidationError from "../../Shared/ValidationError";
import { useForm } from "@inertiajs/inertia-vue3";

// errors = defineProps errors
defineProps({
  errors: Object,
});

// using useForm you not longer need to use reactive reactive({
let form = useForm({
  name: "",
  email: "",
  password: "",
});

// setTimeout(() => {
//   form.reset();
// }, 3000);

let submit = () => {
  form.post("/users");
};
</script>
