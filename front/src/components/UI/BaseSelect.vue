<template>
    <label :for="name">
        <slot></slot>

        <select :name="name" :id="name" @input="$emit('input', $event.target.value)">
            <option value="" selected>All</option>
            <option v-for="(color, index) in selectList" :key="index" :value="color">{{ color }}</option>
        </select>
    </label>
</template>

<script>
    export default {
        name: "BaseSelect",
        props: {
            name: {
                type: String,
                required: true
            },
            selectList: {
                type: Array,
                required: true
            }
        }
    }
</script>