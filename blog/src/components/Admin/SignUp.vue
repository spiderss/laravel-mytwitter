<template>
    <section class="section">
        <div class="columns">
            <div class="column is-4 is-offset-4">
                <h2 class="title has-text-centered">用户注册</h2>
                <form method="POST" @submit.prevent="signup">
                    <div class="field">
                        <label class="label">用户名</label>
                        <p class="control">
                            <input
                                    type="text"
                                    class="input"
                                    v-model="name">
                        </p>
                    </div>

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
                        <button class="button is-primary is-fullwidth is-uppercase">注册</button>
                    </p>
                </form>
            </div>
        </div>
    </section>
</template>
<script>
    import { SIGNUP_MUTATION } from '@/graphql'

    export default {
        name: 'SignUp',
        data () {
            return {
                name: '',
                email: '',
                password: ''
            }
        },
        methods: {
            signup () {
                this.$apollo
                    .mutate({
                        mutation: SIGNUP_MUTATION,
                        variables: {
                            name: this.name,
                            email: this.email,
                            password: this.password
                        }
                    })
                    .then(response => {
                        // 重定向到登录页面
                        this.$router.replace('/login')
                    })
            }
        }
    }
</script>