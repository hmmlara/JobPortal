<template>
    <tr>
        <td>
            {{ index + 1 }}
        </td>
        <td>
            {{ category.name }}
        </td>
        <td>
            <router-link :to="`/admin/category/${category.id}/edit`" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></router-link>
            <button class="btn btn-sm btn-danger" @click="deleteCategory"><i class="fas fa-trash"></i></button>
        </td>
    </tr>
</template>

<script>
export default {
    name: 'CategoryComponent',
    props: ['category','index'],
    methods:{
        deleteCategory(){
            this.$emit('deleteCate',this.index);
            console.log()
        }
    }
}
</script>

<style>

</style>
