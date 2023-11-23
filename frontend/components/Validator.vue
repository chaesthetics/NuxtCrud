<script setup>

const props = defineProps({
    message: String,
});

</script>
<template>
   <p class="text-danger">{{ props.message }}</p>
</template>

<style></style>