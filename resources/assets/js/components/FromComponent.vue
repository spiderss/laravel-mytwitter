// FormComponent.vue

<template>
    <div class="col-md-12">
        <form @submit.prevent="saveTweet">
            <div class="form-group">
                <textarea
                        class="form-control"
                        rows="8" cols="8"
                        maxlength="130"
                        v-model="body"
                        required>
                </textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">
                    发送
                </button>
            </div>
        </form>
    </div>
</template>
<script>
    import Event from '../event.js';
    export default {
        data(){
            return {
                body:'',
                postData: {}
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            saveTweet(){
                axios.post('/tweet/save',{body: this.body}).then(res=>{
                    this.postData = res.data;
                    Event.$emit('added_tweet', this.postData);
                }).catch(e=>{
                    console.log(e)
                });
                this.body=''
            }
        }
    }
</script>