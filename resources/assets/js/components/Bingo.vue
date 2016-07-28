<template>
    <div class="container" id="bingo">
        <div class="row text-xs-center">
            <div class="col-xs">B</div>
            <div class="col-xs">I</div>
            <div class="col-xs">N</div>
            <div class="col-xs">G</div>
            <div class="col-xs">O</div>
        </div>
        <div class="row text-xs-center term-row" v-for="i in [0,1,2,3,4]">
            <term v-for="term in row(i)" :term="term"></term>
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
    methods: {
        row(num) {
            let start = num*5
            let end = start+5

            if(num >= 2) end--
            if(num >= 3) start--

            let terms = this.terms.slice(start, end)

            if(num == 2) {
                terms.splice(2, 0, {
                    term: 'FREE',
                    checked: true,
                    locked: true
                })
            }

            return terms
        }
    },
    components: {Term}
}
</script>

<style>
    #bingo {
        margin-top: 65px;
    }
    .term-row {
        margin-bottom: 15px;
    }
</style>
