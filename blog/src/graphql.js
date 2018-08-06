/**
 * Created by LLZG on 2018/8/6.
 */
import gql from 'graphql-tag'

export const SIGNUP_MUTATION = gql`
    mutation SignupMutation($name: String!, $email: String!, $password: String!) {
        createUser(
            name: $name,
            email: $email,
            password: $password
        ) {
            id
            name
            email
        }
    }
`
export const LOGIN_MUTATION = gql`
    mutation LoginMutation($email: String!, $password: String!) {
        login(
            email: $email,
            password: $password
        ) {
            id
            name
            email
            token
        }
    }
`

export const ALL_USERS_QUERY = gql`
    query AllUsersQuery {
        allUsers {
            id
            name
            email
        }
    }
`
export const USER_QUERY  = gql`
    query UserQueryById($id: String!) {
        user(id: $id) {
            id
            name
            email
            posts {
                id
            }
        }
    }
`

export const ADD_POST_MUTATION = gql`
    mutation AddPostMutation($title: String!, $content: String!) {
        addPost(
            title: $title,
            content: $content
        ) {
            id
            title
            content
            user {
                id
                name
                email
            }
        }
    }
`
export const ALL_POSTS_QUERY = gql`
    query AllPostsQuery {
        allPosts {
            id
            title
            user {
                name
            }
        }
    }
`

export const POST_QUERY = gql`
    query PostQuery($id: String!) {
        post(id: $id) {
            id
            title
            content
            user {
                id
                name
                email
            }
        }
    }
`