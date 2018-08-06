<template>
    <aside class="menu">
        <p class="menu-label">文章</p>
        <ul class="menu-list">
            <li>
                <router-link to="/admin/posts/new">新文章</router-link>
            </li>
            <li>
                <router-link to="/admin/posts">文章列表</router-link>
            </li>
        </ul>
        <p class="menu-label">用户</p>
        <ul class="menu-list">
            <li>
                <router-link to="/admin/users">用户列表</router-link>
            </li>
        </ul>
    </aside>
</template>