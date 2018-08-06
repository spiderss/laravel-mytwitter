<template>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-3">
                    <Menu/>
                </div>
                <div class="column is-9" v-for="u in user">
                    <h2 class="title">用户详情</h2>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">用户名</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">

                                    <input class="input is-static" :value="u.name" readonly>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">邮箱</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input is-static" :value="u.email" readonly>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">文章数</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input is-static" :value="u.posts.length" readonly>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Menu from '@/components/Admin/Menu'
    import { USER_QUERY } from '@/graphql'

    export default {
        name: 'UserDetail',
        components: {
            Menu
        },
        data () {
            return {
                user: '',
                id: this.$route.params.id
            }
        },
        apollo: {
            // fetch user by ID
            user: {
               query: USER_QUERY,
                variables () {
                    return {
                        id: this.id
                    }
                }
            }
        }
    }
</script>