<script lang="ts" setup>
import { ref, onMounted, onUnmounted } from 'vue'

const currentTime = ref(new Date())
const formattedTime = ref(
  currentTime.value.toLocaleTimeString('en-US', {
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit',
    hour12: true,
  }),
)
const formattedDate = ref(
  currentTime.value.toLocaleDateString('en-US', {
    weekday: 'long',
    day: '2-digit',
    month: 'short',
  }),
)

const updateCurrentTime = () => {
  currentTime.value = new Date()
  formattedTime.value = currentTime.value.toLocaleTimeString('en-US', {
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit',
    hour12: true,
  })
  formattedDate.value = currentTime.value.toLocaleDateString('en-US', {
    weekday: 'long',
    day: '2-digit',
    month: 'short',
  })
}

let intervalId: number

onMounted(() => {
  intervalId = setInterval(updateCurrentTime, 1000)
})

onUnmounted(() => {
  clearInterval(intervalId)
})
</script>

<template>
  <div class="mt-3 text-sm text-[#8ea6c8] flex justify-between items-center">
    <p class="set_date">{{ formattedDate }}</p>
    <p class="set_time">{{ formattedTime }}</p>
  </div>
</template>
