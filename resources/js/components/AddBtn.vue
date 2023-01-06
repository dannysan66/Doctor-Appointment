<template>
    <div>
        <div class="form-group" v-for="(input,index) in inputs" :key="index">
            <input type="text" name="medicine[]" class="form-control">
            <span>
                <a href="" @click.prevent="add(index)" v-show="index==inputs.length-1">Add More Medicine</a>

                <a href="" @click.prevent="remove(index)" v-show="index || (!index &&inputs.length > 1)">Remove</a>
            </span>
        </div>
    </div>
</template>

<style>
a {
    text-decoration: none;
    margin-right: 5px;
    color: blue;
}
</style>

<script type="text/javascript">
    export default
    {
        data(){
            return{
                inputs:[{}]
            }
        },
        methods:{
            add(){
                this.inputs.push({
                    medicine:''
                })
            },
            remove(index)
            {
                this.inputs.splice(index,1)
            }
        }
    }
</script>
