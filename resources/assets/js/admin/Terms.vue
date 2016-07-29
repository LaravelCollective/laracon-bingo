<template>
    <div>
        <button class="btn btn-primary pull-right" @click="reload" :disabled="loading">
            <i class="fa fa-refresh" :class="{'fa-spin': loading}"></i>
        </button>
        <div class="row">
            <div class="col-xs" v-for="i in [0,1,2,3,4]">
                <div class="list-group">
                    <button
                        v-for="term in row(i) | orderBy 'term'"
                        :class="{'list-group-item-success': term.verified}"
                        @click="verify(term)"
                        class="list-group-item list-group-item-action"
                        type="button"
                    >
                        {{ term.id }}
                        <span class="pull-right">{{ term.term }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: false,
            terms: []
        }
    },
    methods: {
        reload() {
            this.loading = true
            this.$http.get('/api/terms')
                .then(response => {
                    this.loading = false
                    this.terms = response.json()
                })
        },
        row(num) {
            let start = num*20
            let end = start+20

            return this.terms.slice(start, end)
        },
        verify(term) {
            this.loading = true
            this.$http.post('/api/terms/' + term.id + '/verify')
                .then(response => {
                    this.reload()
                })
        }
    },
    ready() {
        this.reload()
    }
}
</script>
