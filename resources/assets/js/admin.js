import SPA from './SPA'
import Admin from './Admin.vue'

let $vm = new SPA()

$vm
	.app(Admin)
	.start('#admin')
