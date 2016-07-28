<template>
    <div class="container-fluid" id="bingo">
        <table class="table">
            <thead>
                <tr>
                    <th>B</th>
                    <th>I</th>
                    <th>N</th>
                    <th>G</th>
                    <th>O</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="i in [0,1,2,3,4]">
                    <td v-for="term in row(i)">
                        <term :term="term"></term>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import Term from './Term.vue'

export default {
    data() {
        return {
            loading: false,
            user: window.User
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
                    name: 'FREE',
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
    th {
        text-align: center;
    }
</style>
