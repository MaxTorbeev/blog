<template id="select-template">
    <select>
        <option :value="index" v-for="(option, index) in optionsList"> {{ option }}</option>
    </select>
</template>
<script>
    export default {
        template: '#select-template',

        props: [
            'id',
            'optionsList'
        ],
//
        created(){
            console.log(this.optionsList);
        },

        methods: {
//            selectNames() {
//                return this.selectName
//            }
        },

        mounted() {
            console.log('Component ready.')
        }
    }
</script>
