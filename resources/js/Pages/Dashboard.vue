<script lang="ts" setup>
import { ref } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import TodaysDateBar from '@/Components/TodaysDateBar.vue'
import NewTask from '@/Components/NewTask.vue'
import TaskList from '@/Components/TaskList.vue'
import NewProject from '@/Components/NewProject.vue'

const hide1 = ref<boolean>(false)
const hide2 = ref<boolean>(false)
</script>

<template>
  <AppLayout title="Tasks">
    <div class="flex justify-center items-center min-h-screen bg-[#cbd7e3]">
      <div class="h-auto w-96 bg-white rounded-lg p-4">
        <TodaysDateBar />
        <p class="text-xl font-semibold mt-2 text-[#063c76]">To-do List</p>

        <NewProject v-if="!hide2" @close="hide1 = false" @open="hide1 = true" />
        <NewTask v-if="!hide1" @close="hide2 = false" @open="hide2 = true" />
        <TaskList v-if="!hide1 && !hide2" />
      </div>
    </div>
  </AppLayout>
</template>
