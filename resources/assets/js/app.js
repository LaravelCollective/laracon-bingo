import SPA from './SPA'
import App from './App.vue'

let $vm = new SPA()

$vm
	.app(App)
	.start('#app')
