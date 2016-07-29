<template>
    <div>
        <a v-link="{path: '/users'}" class="btn btn-primary pull-right">
            <i class="fa fa-chevron-left"></i>
        </a>
        <h3 v-if="user" class="text-center">
            {{ user.name }} - {{ user.email }}
            <i class="fa fa-github" v-show="user.github_id"></i>
            <i class="fa fa-facebook" v-show="user.facebook_id"></i>
        </h3>
        <bingo v-if="user" :user="user" :admin="true"></bingo>
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
