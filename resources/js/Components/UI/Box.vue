<template>
    <div class="bg-white dark:bg-transparent border border-gray-200 dark:border-gray-800 rounded-md p-4 shadow-sm dark:text-gray-300">
      <div class="text-gray-500 font-medium mb-1 text-sm">
        <slot name="header" />
      </div>
      <slot />
    </div>
  </template>