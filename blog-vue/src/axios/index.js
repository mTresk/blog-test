import axios from 'axios'
import router from '@/router/index'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.baseURL = import.meta.env.VITE_SERVICE_URL
axios.defaults.withCredentials = true
// axios.interceptors.response.use({}, (error) => {
//     if (error.response.status === 401 || error.response.status === 419) {
//         const authenticated = localStorage.getItem('authenticated')
//         if (authenticated) {
//             localStorage.removeItem('authenticated')
//         }
//         router.push({name: 'login'})
//     }
// })

export default axios
