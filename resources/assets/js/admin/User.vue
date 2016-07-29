<template>
    <div>
        <a v-link="{path: '/users'}" class="btn btn-primary pull-right">
            <i class="fa fa-chevron-left"></i>
        </a>
        <h3 v-if="user" class="text-center">{{ user.name }} - {{ user.email }}</h3>
        <bingo v-if="user" :user="user"></bingo>
    </div>
</template>

<script>
import Bingo from '../components/Bingo.vue'

export default {
    data() {
        return {
            user: null
        }
    },
    methods: {
        reload() {
            this.$http.get('/api/users/' + this.$route.params.user)
                .then(response => {
                    this.user = response.json()
                })
        }
    },
    ready() {
        this.reload()
    },
    components: {Bingo}
}
</script>
