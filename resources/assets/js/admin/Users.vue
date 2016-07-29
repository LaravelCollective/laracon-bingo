<template>
    <div>
        <div class="list-group">
            <a v-link="{path: '/users/' + user.id }" class="list-group-item list-group-item-action" v-for="user in users | orderBy 'submitted_at'">
                {{ user.name }}
                <span class="pull-right" v-show="user.submitted_at">
                    submitted {{ user.submitted_at | humantime}}
                </span>
            </a>
        </div>
    </div>
</template>

<script>
import moment from 'moment'

export default {
    data() {
        return {
            loading: false,
            users: []
        }
    },
    methods: {
        reload() {
            this.loading = true
            this.$http.get('/api/users')
                .then(response => {
                    this.loading = false
                    this.users = response.json()
                })
        }
    },
    ready() {
        this.reload()
    },
    filters: {
        humantime(value) {
            return moment(value).fromNow()
        }
    }
}
</script>
