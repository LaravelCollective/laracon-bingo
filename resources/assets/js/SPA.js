import Vue from 'vue'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'

export default class {

    constructor() {
        // Use Plugins
        Vue.use(VueResource)
        Vue.use(VueRouter)

        // Configure Stuff
        Vue.http.options.root = window.Delivvrator ? window.Delivvrator.root : null

        // Create Router
        this.router = new VueRouter({})
        this.routing = false
    }

    // Override the HTTP root
    root(root) {
        Vue.http.options.root = root

        return this
    }

    // Set global HTTP Headers
    headers(headers) {
        Vue.http.headers.common = headers

        return this
    }

    // Configure Routes
    routes(routes) {
        this.router.map(routes)
        this.routing = true

        return this
    }

    // Configure Redirects
    redirects(redirects) {
        this.router.redirect(redirects)
        this.routing = true

        return this
    }

    // Set the App
    app(app) {
        this.app = app

        return this
    }

    // Start the Application
    start(target) {
        if(this.routing)
            this.router.start(this.app, target)
        else
            new Vue(this.app).$mount(target)
    }

};