<template>
    <div class="container" id="bingo">
        <div class="row text-xs-center">
            <div class="col-xs">B</div>
            <div class="col-xs">I</div>
            <div class="col-xs">N</div>
            <div class="col-xs">G</div>
            <div class="col-xs">O</div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        user: () => window.User,
        terms() {
            return this.user.terms
        }
    }
}
</script>

<style>
    #bingo {
        margin-top: 65px;
    }
</style>
