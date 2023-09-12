<script setup>
import { computed } from 'vue'

const props = defineProps({
  price: {
    type: [Number, String],
    required: true,
  },
})

const formattedPrice = computed(() => {
  return Number(props.price).toLocaleString('fr-FR', {
    style: 'currency',
    currency: 'EUR',
    minimumFractionDigits: 0,
  })
})


</script>

<template>
  <span>
    {{ formattedPrice }}
  </span>
</template>
