<template>
    <div @click="toggleChecked()" class="term" :class="term.checked ? 'checked' : ''">
        {{ term.name }}
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
    border: 1px solid red;
    height: 15vh;
    width: 15vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.term.checked {
    border: 1px solid green;
}
</style>
