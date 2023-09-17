<script setup>
defineProps({
  property: {
    type: Object,
    required: true,
  },
})

</script>

<template>
  <span>
    {{ property.address }} {{ property.city }}
  </span>
</template>
