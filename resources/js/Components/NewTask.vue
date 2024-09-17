<script lang="ts" setup>
import { ref, computed, defineEmits } from 'vue'
import { useForm } from '@inertiajs/vue3'
import type { Project, Task } from '@/definitions/types.ts'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import {
  Combobox,
  ComboboxButton,
  ComboboxInput,
  ComboboxOption,
  ComboboxOptions,
} from '@headlessui/vue'

const showForm = ref<boolean>(false)
const query = ref<string>('')

const props = defineProps<{ projects: Project[] }>()
const projects = props.projects

const form = useForm({
  id: 0,
  title: '',
  description: '',
  dateCreated: new Date(),
  dateToBeCompleted: new Date().toISOString(),
  dateCompleted: undefined,
  project: null,
})

const filteredProject = computed(() =>
  query.value === ''
    ? projects
    : projects.filter((project) => {
        return project.title.toLowerCase().includes(query.value.toLowerCase())
      }),
)

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
  form.post('/tasks', {
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
      class="w-full rounded-md bg-white px-3 py-2 text-sm font-semibold text-green-600 border border-green-600 border-dashed hover:bg-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
      @click="handleButtonClick"
    >
      New Task
    </button>

    <div v-if="showForm">
      <p class="text-sm my-3">Fill in the form to create a new task.</p>
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
        <div class="mb-4">
          <label
            for="description"
            class="block text-sm font-medium text-gray-700"
            >Description</label
          >
          <textarea
            id="description"
            v-model="form.description"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
          ></textarea>
        </div>
        <div class="mb-4">
          <label for="project" class="block text-sm font-medium text-gray-700"
            >Project</label
          >
          <Combobox
            as="div"
            v-model="form.project"
            @update:modelValue="query = ''"
          >
            <div class="relative mt-2">
              <ComboboxInput
                class="w-full rounded-md border-0 bg-white py-1.5 pl-3 pr-10 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                @change="query = $event.target.value"
                @blur="query = ''"
                :display-value="(proj) => proj?.title"
              />
              <ComboboxButton
                class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none"
              >
                <ChevronUpDownIcon
                  class="h-5 w-5 text-gray-400"
                  aria-hidden="true"
                />
              </ComboboxButton>

              <ComboboxOptions
                v-if="filteredProject.length > 0"
                class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
              >
                <ComboboxOption
                  v-for="proj in filteredProject"
                  :key="proj.id"
                  :value="proj"
                  as="template"
                  v-slot="{ active, selected }"
                >
                  <li
                    :class="[
                      'relative cursor-default select-none py-2 pl-3 pr-9',
                      active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                    ]"
                  >
                    <span
                      :class="['block truncate', selected && 'font-semibold']"
                    >
                      {{ proj.title }}
                    </span>

                    <span
                      v-if="selected"
                      :class="[
                        'absolute inset-y-0 right-0 flex items-center pr-4',
                        active ? 'text-white' : 'text-indigo-600',
                      ]"
                    >
                      <CheckIcon class="h-5 w-5" aria-hidden="true" />
                    </span>
                  </li>
                </ComboboxOption>
              </ComboboxOptions>
            </div>
          </Combobox>
        </div>
        <div class="mb-4">
          <label
            for="dateToBeCompleted"
            class="block text-sm font-medium text-gray-700"
            >Date to be Completed</label
          >
          <input
            type="datetime-local"
            id="dateToBeCompleted"
            v-model="form.dateToBeCompleted"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
          />
        </div>
        <div class="flex justify-between">
          <button
            type="submit"
            class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white hover:bg-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
          >
            Save Task
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
