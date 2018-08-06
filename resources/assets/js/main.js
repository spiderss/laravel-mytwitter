/**
 * Created by LLZG on 2018/8/6.
 */
require('./bootstrap');

import Vue from 'vue'
import App from './App'
import router from './router'
import { ApolloClient } from 'apollo-client'
import { HttpLink } from 'apollo-link-http'
import { InMemoryCache } from 'apollo-cache-inmemory'
import VueApollo from 'vue-apollo'
Vue.config.productionTip = false
window.Vue = require('vue');

const httpLink = new HttpLink({
    // GraphQL 服务器 URL，需要使用绝对路径
    uri:"http://local.laravel.cn/blog"
})

// 创建 apollo client
const apolloClient = new ApolloClient({
    link: httpLink,
    cache: new InMemoryCache()
})
const apolloProvider = new VueApollo({
    defaultClient: apolloClient
})

Vue.use(VueApollo)
const app = new Vue({
    el: '#app',
    router,
    apolloProvider,
    components:{App},
    template :'<App/>'

});
