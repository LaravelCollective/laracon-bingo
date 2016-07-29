<template>
    <div class="col-xs">
        <div class="term" :class="termClasses" @click="toggleChecked">
            <i class="fa fa-check" v-show="admin && term.term.verified"></i>
            {{ term.name }}
        </div>
    </div>
</template>

<script>

export default {
    props: ['term', 'readonly', 'admin'],
    computed: {
        termClasses() {
            let classes = ''

            if(this.term.checked) {
                classes = classes + ' checked'
            }

            if(this.term.locked) {
                classes = classes + ' locked'
            }

            if(!this.readonly) {
                classes = classes + ' clickable'
            }

            return classes
        }
    },
    methods: {
        toggleChecked() {
            if (this.term.locked || this.readonly) {
                return;
            }

            this.$http.post(`/api/user-term/${this.term.id}/toggle`)
                .then(response => {
                    this.term = response.json()
                })
        }
    }
}
</script>

<style>
.term {
    background-color: #ccc;
    color: #fff;
    height: 13vh;
    line-height: 13vh;
    border-radius: 3px;
    text-transform: uppercase;
}
.term.clickable {
    cursor: pointer;
}
.term.checked {
    background-color: #f4645f;
}
.term.locked {
    background-image: url('/img/taylor_mug.png');
    background-position: center center;
    background-size: cover;
}
</style>
