<template>
    <nav class="navbar navbar-light bg-faded navbar-fixed-top">
        <a class="navbar-brand" href="https://laravelcollective.com" target="_blank">
            <img src="/img/full-logo.png" alt="Laravel Collective" class="img-responsive">
        </a>
        <ul class="nav navbar-nav pull-xs-right">
            <li class="nav-item">
                <a href="/auth/logout" class="nav-link">Logout</a>
            </li>
        </ul>
    </nav>
</template>

<script>

export default {
    //
}
</script>

<style>
    .navbar-brand>img {
        max-height: 24px;
    }
</style>
