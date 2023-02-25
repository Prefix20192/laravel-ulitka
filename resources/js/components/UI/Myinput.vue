<template>
    <input :value="modelValue" @input="updateInput" class="current-demo" type="text">
</template>

<script>
export default {
    name: "my-input",
    props:{
        modelValue:[String, Number]
    },

    methods:{
        updateInput(event){
            this.$emit('update:modeValue', event.target.value)
        }
    }
}
</script>

<style scoped>

</style>
