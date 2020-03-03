import axios from 'axios'

// set global url
const instance = axios.create({
    baseURL : 'https://testmode-4bad1.firebaseio.com/'
})

export default instance;