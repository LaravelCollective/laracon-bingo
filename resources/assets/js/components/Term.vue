<template>
    <div class="col-xs">
        <div class="term" :class="termClasses" @click="toggleChecked">
            {{ term.name }}
        </div>
    </div>
</template>

<script>

export default {
    props: ['term'],
    computed: {
        termClasses() {
            let classes = ''

            if(this.term.checked) {
                classes = classes + ' checked'
            }

            if(this.term.locked) {
                classes = classes + ' locked'
            }

            return classes
        }
    },
    methods: {
        toggleChecked() {
            if (this.term.locked) {
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
    height: 15vh;
    line-height: 15vh;
    border-radius: 3px;
    text-transform: uppercase;
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
