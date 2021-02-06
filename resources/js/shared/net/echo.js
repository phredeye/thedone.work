
import Echo from 'laravel-echo';

// @todo - does pusher need to be attached to window?
window.Pusher = require('pusher-js');

export const createEcho = () => {
    const echo = new Echo({
        broadcaster: 'pusher',
        key: process.env.MIX_PUSHER_APP_KEY,
        cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        forceTLS: true
    });
}
