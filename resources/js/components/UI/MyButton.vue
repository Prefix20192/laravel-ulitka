<template>
<button class="btn-my">
    <slot></slot>
</button>
</template>

<script>
export default {
    name: "my-button"
}
</script>

<style scoped>
.btn-my{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    font-size:15px;
}
</style>
