<template>
    <div>
        <nav-bar>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="/" class="nav-link">Back to Bingo <i class="fa fa-external-link"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" v-link="{path: '/'}">Terms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" v-link="{path: '/users'}">Users</a>
                </li>
            </ul>
        </nav-bar>
        <div class="container-fluid" id="body">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import NavBar from './components/NavBar.vue'

export default {
    components: {NavBar}
}
</script>

<style>
#body {
    margin-top: 65px;
}
</style>
