<template id="tasks-template">
    <ul>
        <li
                :class="{ 'completed': task.completed }"
                v-for="task in tasks"
                @click="task.completed = ! task.completed;"
        >
            @{{ task.body }}
        </li>
    </ul>
</template>
<script>
    export default {
        template: '',
        mounted() {
            console.log('Component ready.')
        }
    }
</script>
