<template>
    <div>
        <nav-bar></nav-bar>
        <bingo :user.sync="user"></bingo>
    </div>
</template>

<script>
import NavBar from './components/NavBar.vue'
import Bingo from './components/Bingo.vue'

export default {
    data() {
        return {
            user: window.User
        }
    },
    components: {NavBar, Bingo}
}
</script>
