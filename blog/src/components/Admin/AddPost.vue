<template>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-3">
                    <Menu/>
                </div>
                <div class="column is-9">
                    <h2 class="title">发布新文章</h2>

                    <form method="post" @submit.prevent="addPost">
                        <div class="field">
                            <label class="label">标题</label>

                            <p class="control">
                                <input
                                        class="input"
                                        v-model="title"
                                        placeholder="Post title">
                            </p>
                        </div>

                        <div class="field">
                            <label class="label">内容</label>

                            <p class="control">
                                <textarea
                                        class="textarea"
                                        rows="10"
                                        v-model="content"
                                        placeholder="Post content"
                                ></textarea>
                            </p>
                        </div>

                        <p class="control">
                            <button class="button is-primary">发布</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import Menu from '@/components/Admin/Menu'
    import { ADD_POST_MUTATION, ALL_POSTS_QUERY } from '@/graphql'

    export default {
        name: 'AddPost',
        components: {
            Menu
        },
        data () {
            return {
                title: '',
                content: ''
            }
        },
        methods: {
            addPost () {
                this.$apollo
                    .mutate({
                        mutation: ADD_POST_MUTATION,
                        variables: {
                            title: this.title,
                            content: this.content
                        },
                        update: (store, { data: { addPost } }) => {
                            // 从缓存中读取所有文章数据
                            const data = store.readQuery({ query: ALL_POSTS_QUERY })

                            // 将新发布文章添加到已有文章列表
                            data.allPosts.push(addPost)

                            // 回写文章数据到缓存
                            store.writeQuery({ query: ALL_POSTS_QUERY, data })
                        }
                    })
                    .then(response => {
                        // 重定向到文章列表页
                        this.$router.replace('/admin/posts')
                    })
            }
        }
    }
</script>