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
            <term v-for="term in row(i)" :term="term" :readonly="user.submitted_at"></term>
        </div>
        <br>
        <button class="btn btn-block btn-lg btn-primary" id="bingoButton" v-show="!user.submitted_at" @click="bingo">BINGO!</button>
        <div class="alert alert-info" v-show="user.submitted_at">
            Thanks for playing Laracon Bingo! We'll be in touch if you're a winner! Tweet <a href="https://twitter.com/artisangoose" target="_blank">@artisangoose</a> if you've submitted by mistake.
        </div>
    </div>
</template>

<script>
import Term from './Term.vue'

export default {
    props: ['user'],
    data() {
        return {
            loading: false
        }
    },
    computed: {
        terms() {
            return this.user.terms
        }
    },
    methods: {
        reload() {
            this.loading = true
            this.$http.get('/api/me')
                .then(response => {
                    this.loading = false
                    this.user = response.json()
                })
        },
        row(num) {
            let start = num*5
            let end = start+5

            if(num >= 2) end--
            if(num >= 3) start--

            let terms = this.terms.slice(start, end)

            if(num == 2) {
                terms.splice(2, 0, {
                    name: '',
                    checked: true,
                    locked: true
                })
            }

            return terms
        },
        bingo() {
            this.loading = true
            this.$http.post('/api/me/bingo')
                .then(response => {
                    this.loading = false
                    this.user = response.json()
                })
        }
    },
    components: {Term}
}
</script>

<style>
    #bingo {
        margin-top: 65px;
    }
    #bingoButton {
        background-color: #f4645f;
        border-color: #d84b46;
    }
    .term-row {
        margin-bottom: 15px;
    }
</style>
