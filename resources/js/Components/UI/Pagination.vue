<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({links:Array})

</script>

<template>
  <div class="flex gap-1 absolute bottom-8">
    <Link
      v-for="(link, index) in links"
      :key="index" class="py-2 px-4 rounded-md"
      :href="link.url"
      :class="{'bg-indigo-500 text-white dark:bg-indigo-700 dark:text-gray-300': link.active}"
      v-html="link.label"
    >
  </div>
</template>
