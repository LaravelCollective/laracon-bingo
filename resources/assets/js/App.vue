<template>
    <div>
        <nav-bar></nav-bar>
        <bingo></bingo>
    </div>
</template>

<script>
import NavBar from './components/NavBar.vue'
import Bingo from './components/Bingo.vue'

export default {
    components: {NavBar, Bingo}
}
</script>
