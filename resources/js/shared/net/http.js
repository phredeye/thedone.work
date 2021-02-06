import axios from 'axios'

export const createHttp = (config = {}) => {
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    const http = axios.create(config);
}
