// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'

import { ApolloClient } from 'apollo-client'
import { HttpLink } from 'apollo-link-http'
import { InMemoryCache } from 'apollo-cache-inmemory'
import VueApollo from 'vue-apollo'

import { setContext } from 'apollo-link-context'

Vue.config.productionTip = false

const httpLink = new HttpLink({
 /* URL to graphql server, you should use an absolute URL here*/
  uri: 'http://local.laravel.cn/graphql'
})

const authLink = setContext((_, { headers }) => {
    // 从 LocalStorage 中获取认证 token（如果存在的话）
    const token = localStorage.getItem('blog-app-token')

    // return the headers to the context so httpLink can read them
    return {
        headers: {
            ...headers,
            authorization: token ? `Bearer ${token}` : null
        }
    }
})

/*create the apollo client*/
const apolloClient = new ApolloClient({
  link:authLink.concat(httpLink),
  cache: new InMemoryCache()
})
/* install the vue plugin*/
Vue.use(VueApollo)

const apolloProvider = new VueApollo({
  defaultClient: apolloClient
})
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  apolloProvider,
  components: { App },
  template: '<App/>'
})
