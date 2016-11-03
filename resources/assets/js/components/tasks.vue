<template id="tasks-template">
    <div>
        <h1>tasks ({{remaining}})</h1>
        <ul v-if="list.length">
            <li
                :class="{ 'completed': task.completed }"
                v-for="task in list"
                @click="task.completed = ! task.completed;"
            >
                {{ task.body }}
                <strong @click="deleteTask(task)">x</strong>
            </li>
        </ul>

        <p v-else>No tasks yet! </p>

        <button @click="clearCompeted">Clear complete</button>
    </div>

</template>

<script>
    export default {
        template: '#tasks-template',
        props: ['list'],
        created() {
            this.list = JSON.parse(this.list)
        },
        methods: {
            toggleCompletedFor(task) {
                task.completed = ! task.completed;
            },

            isComplited(task) {
                return task.completed;
            },

            inProgress(task) {
                return ! this.isComplited(task);
            },

            deleteTask(task) {
                var index = this.list.indexOf(task);
                this.list.splice(index, 1);
            },

            clearCompeted() {
                this.list = this.list.filter(this.inProgress)
            }
        },
        computed: {
            remaining() {
                var vm = this;
                return this.list.filter(this.inProgress).length;
            }
        },
        mounted() {
            console.log('Component Tasks ready.')
        }
    }
</script>
