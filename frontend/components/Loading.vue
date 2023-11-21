<script setup>
const props = defineProps({
    title: String,
});

</script>

<template>
  <div>
    <div class="spinner-border text-dark" role="status">
        <span class="visually-hidden">Loading...</span>
    </div> {{ props.title }}...
</div>
</template>

<style>

</style>