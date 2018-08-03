//粉丝列表
<template>
    <div class="col-md-12">
         <span  v-for="item in follows">{{ item.name }}</span>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                follows: [
                    {"name": 'zhang', "ava": ''}
                ]
            }
        },
        mounted(){
                axios.post("/users/小龙人/focuses",{}).then(res=>{
                    this.follows = res.data;
                });
        }
    }
</script>