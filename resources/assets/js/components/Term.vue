<template>
    <div class="col-xs">
        <div class="term" :class="term.checked ? 'checked' : ''" @click="toggleChecked">
            {{ term.name }}
        </div>
    </div>
</template>

<script>

export default {
    props: ['term'],
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
    background-color: #f4645f;
    color: #fff;
    height: 15vh;
    line-height: 15vh;
    border-radius: 3px;
}
.term.checked {
    background-color: #ccc;
    text-transform: uppercase;
}
</style>
