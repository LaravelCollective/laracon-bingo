import SPA from './SPA'
import Admin from './Admin.vue'

import Terms from './admin/Terms.vue'
import Users from './admin/Users.vue'
import User from './admin/User.vue'

let $vm = new SPA()

$vm
	.routes({
		'/': {
			component: Terms
		},
		'/users': {
			component: Users
		},
		'/users/:user': {
			component: User
		}
	})
	.app(Admin)
	.start('#admin')
