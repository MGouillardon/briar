<script setup>
defineProps({
  property: {
    type: Object,
    required: true,
  },
})

</script>

<template>
    <div>

        <span>
            {{ property.title }}
        </span>
    </div>
</template>
