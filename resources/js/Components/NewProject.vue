<script setup lang="ts">
import { defineEmits, ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

const showForm = ref<boolean>(false)
const form = useForm({
  title: '',
})

const handleButtonClick = () => {
  emit('open')
  showForm.value = true
}

const emit = defineEmits(['close', 'open'])
const closeForm = () => {
  emit('close')
  showForm.value = false
}

const submit = () => {
  form.post('/project', {
    preserveScroll: false,
    preserveState: false,
  })
}
</script>
<template>
  <div>
    <button
      v-if="!showForm"
      type="button"
      class="w-full rounded-md bg-white px-3 py-2 text-sm mb-1 mt-2 font-semibold text-green-600 border border-green-600 border-dashed hover:bg-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
      @click="handleButtonClick"
    >
      New Project
    </button>

    <div v-if="showForm">
      <p class="text-sm my-3">Fill in the form to create a new project.</p>
      <form @submit.prevent="submit">
        <div class="mb-4">
          <label for="title" class="block text-sm font-medium text-gray-700"
            >Title</label
          >
          <input
            type="text"
            id="title"
            v-model="form.title"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
          />
        </div>
        <div class="flex justify-between">
          <button
            type="submit"
            class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white hover:bg-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
          >
            Save Project
          </button>
          <button
            type="button"
            class="rounded-md bg-red-600 px-2 py-1 text-sm font-semibold text-white hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
            @click="closeForm"
          >
            Close
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
