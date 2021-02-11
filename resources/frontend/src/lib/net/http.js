import axios from 'axios'

const injectToken = (config) => {
    const token = localStorage.getItem('auth_token');
    if(token !== null) {
        config.headers['Authorization'] = `Bearer ${token}`
    }
    return token
}

export const createHttp = (config = {}) => {

    const http = axios.create({
        common: {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        },
        ...config
    });

    http.interceptors.request.use(injectToken)

    return http
}

export default createHttp()
