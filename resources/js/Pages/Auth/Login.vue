<template>
  <Head title="Login" />

  <main class='grid place-items-center min-h-screen'>
    <section class='bg-white p-8 rounded mx-auto max-w-md rounded-xl border'>
      <h1 class="text-3xl">Login</h1>
      <form @submit.prevent="submit" class="max-w-md mx-auto mt-7">
        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email" >
            E-mail
          </label>
          <input v-model="form.email" name="email" id="email" class="border rounded border-gray-400 p-2 w-full" type="email" />
          <ValidationError :hasError="$page.props.errors.email" />
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password" >
            Password
          </label>
          <input v-model="form.password" type="password" name="password" id="password" class="border rounded border-gray-400 p-2 w-full" />
          <ValidationError :hasError="form.errors.password" />
        </div>

        <div class="mb-6">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :disabled="form.processing" >
            Login
          </button>
        </div>
      </form>
    </section>
  </main>

</template>

<script>
import ValidationError from '../../Shared/ValidationError.vue';

export default {
  layout: null
}
</script>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

// errors = defineProps errors
defineProps({
  errors: Object,
});

let form = useForm({
  email: "",
  password: "",
  errors: Object
});

let submit = () => {
  form.post("/login");
  console.log(form);
};
</script>
