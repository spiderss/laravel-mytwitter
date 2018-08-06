<template>
    <section class="section">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <router-link class="button is-link is-small" to="/">回到首页</router-link>

                <h1 class="title">
                    {{ post.title }}
                </h1>

                <div class="content">
                    {{ post.content }}
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { POST_QUERY } from '@/graphql'

    export default {
        name: 'PostDetail',
        data () {
            return {
                post: '',
                id: this.$route.params.id
            }
        },
        apollo: {
            // 通过 id 获取文章
            post: {
                query: POST_QUERY,
                variables () {
                    return {
                        id: this.id
                    }
                }
            }
        }
    }
</script>