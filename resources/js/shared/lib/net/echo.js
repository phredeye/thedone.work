/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo'
import Pusher from 'pusher-js'

// @todo figure out if this is even necessary,
//  does pusher need to be in window context?
window.Pusher = Pusher

export const createEcho = () => {
    const echo = new Echo({
        broadcaster: 'pusher',
        key: process.env.MIX_PUSHER_APP_KEY,
        cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        forceTLS: true
    });

    return echo;
}
