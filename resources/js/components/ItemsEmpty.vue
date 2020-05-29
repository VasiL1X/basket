<template>
    <div class=" text-center p-5">
        <img src="/images/myItemsEmptySVG.svg" alt="Items Not Found">
        <h2 class="font-weight-bolder">{{ this[type].title }}</h2>
        <p class="text-secondary">{{ this[type].content }}</p>
        <router-link :to="{name:'departments'}" class="mt-2">
            <button class="btn text-white font-weight-bolder browse-categories">Browse categories</button>
        </router-link>
    </div>
</template>

<script>
    export default {
        name: "ItemsEmpty",
        props:['type' , 'value'],
        data() {
            return {
                discount:{
                    title:'Reordering will be easy',
                    content:'Items will show up here so you can find discounted items'
                },
                favorite:{
                    title:'Reordering will be easy',
                    content:'Items you mark as favorite will show up here so you can find your favorite items'
                },
                aisle:{
                    title:'Oops',
                    content:'The store have not product for this aisle yet'
                },
                department:{
                    title:'Oops',
                    content:'The store have not aisle for this department yet'
                },
                myItems:{
                    title:'Reordering will be easy',
                    content:'Items you order will show up here so you can find your favorite items again'
                },
                addItemToOrder:{
                    title:'Oops',
                    content:"We couldn't find results for '"+this.value+"' at this store"
                },
            };
        },
        mounted(){
        }
    }
</script>

<style scoped>
    .browse-categories {
        background: #61bf3d;
        transition-duration: .5s;
    }
    h2.font-weight-bolder{
        line-height: 1.5em;
    }
    .browse-categories:hover, .browse-categories:active {
        transition-duration: .5s;
        opacity: .8;
        background: rgb(97, 191, 61);
    }
</style>
