export const AuthStorage = {
    save: (data) => {
        localStorage.setItem('AUTH_DATA', data)
    },
    token: () => {
        const authData = localStorage.getItem('AUTH_DATA')
        return authData.access_token
    },
    hasToken: () => {
        return (this.token !== null)
    },
    clear: () => {
        localStorage.removeItem('AUTH_DATA')
    }
}
