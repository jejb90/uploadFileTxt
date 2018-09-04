export default {

    getHeaders () {
        return {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${window.UserApiToken}`
        }
    }

};