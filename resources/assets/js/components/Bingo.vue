<template>
    <div class="container" id="bingo">
        <div class="row text-xs-center">
            <div class="col-xs">B</div>
            <div class="col-xs">I</div>
            <div class="col-xs">N</div>
            <div class="col-xs">G</div>
            <div class="col-xs">O</div>
        </div>
        <div class="row text-xs-center">
            <term v-for="term in terms | limitBy 5" :term="term"></term>
        </div>
        <div class="row text-xs-center">
            <term v-for="term in terms | limitBy 5 5" :term="term"></term>
        </div>
        <div class="row text-xs-center">
            <term v-for="term in terms | limitBy 2 10" :term="term"></term>
            <term :term="{term: 'FREE'}"></term>
            <term v-for="term in terms | limitBy 2 12" :term="term"></term>
        </div>
        <div class="row text-xs-center">
            <term v-for="term in terms | limitBy 5 14" :term="term"></term>
        </div>
        <div class="row text-xs-center">
            <term v-for="term in terms | limitBy 5 19" :term="term"></term>
        </div>
    </div>
</template>

<script>
import Term from './Term.vue'

export default {
    computed: {
        user: () => window.User,
        terms() {
            return this.user.terms
        }
    },
    components: {Term}
}
</script>

<style>
    #bingo {
        margin-top: 65px;
    }
</style>
