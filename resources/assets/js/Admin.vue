<template>
    <div>
        <nav-bar></nav-bar>
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
