<template>
    <section class="section">
        <div class="columns">
            <div class="column is-4 is-offset-4">
                <h2 class="title has-text-centered">用户登录</h2>

                <form method="POST" @submit.prevent="login">
                    <div class="field">
                        <label class="label">邮箱</label>

                        <p class="control">
                            <input
                                    type="email"
                                    class="input"
                                    v-model="email">
                        </p>
                    </div>

                    <div class="field">
                        <label class="label">密码</label>

                        <p class="control">
                            <input
                                    type="password"
                                    class="input"
                                    v-model="password">
                        </p>
                    </div>

                    <p class="control">
                        <button class="button is-primary is-fullwidth is-uppercase">登录</button>
                    </p>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
    import { LOGIN_MUTATION } from '@/graphql'

    export default {
        name: 'LogIn',
        data () {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            login () {
                this.$apollo
                    .mutate({
                        mutation: LOGIN_MUTATION,
                        variables: {
                            email: this.email,
                            password: this.password
                        }
                    })
                    .then(response => {
                        // 保存用户 token 到 local storage
                        localStorage.setItem('blog-app-token', response.data.login.token)

                        // 重定向用户到文章列表页
                        this.$router.replace('/admin/posts')
                    }).catch(e=>{
                        console.log(e)
                })
            }
        }
    }
</script>