<template>
    <label :for="name">
        <input
            type="checkbox"
            :name="name" :id="name"
            :checked="checked"
            v-on:change="$emit('input', $event.target.checked)"
        >
        <slot></slot>
    </label>
</template>

<script>
    export default {
        name: "Checkbox",
        props: {
            name: {
                type: String,
                required: true
            },
            checked: {
                type: Boolean,
                default: false
            }
        }
    }
</script>